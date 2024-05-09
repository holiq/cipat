<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Transaction::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-header">
            <h1>Tambah Transaksi</h1>
        </div>
        <div class="card-body">
            <form method="post" action="<?= route_to('Transaction::store') ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_transaction">No Transaksi</label>
                            <input type="text" name="no_transaction" id="no_transaction" class="form-control" value="<?= 'TRX' . date('siHmdY') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="">--Pilih--</option>
                                <?php foreach ($customer as $row) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transaction_date">Tanggal Transaksi</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="form-group table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic_rows">
                                    <tr id="row_1" class="dynamic_row">
                                        <td>
                                            <select name="product_id[]" class="form-control" style="min-width: 8rem;" onchange="fetchPrice(1)">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($product as $row) : ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><input type="number" name="qty[]" class="form-control" style="min-width: 4rem;" onchange="calculateTotal()" value="1"></td>
                                        <td><input type="text" name="price[]" class="form-control" style="min-width: 8rem;" value="0" readonly></td>
                                        <td><input type="text" name="amount[]" class="form-control" style="min-width: 10rem;" value="0" readonly></td>
                                        <td><button type="button" class="btn btn-primary" onclick="addRow()">Tambah</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6 offset-md-6">
                        <div class="form-group">
                            <label for="sub_total">Sub Total</label>
                            <input type="text" name="sub_total" id="sub_total" class="form-control" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="discount">Diskon</label>
                            <div class="input-group">
                                <input type="number" name="discount" id="discount" class="form-control" value="0" onchange="calculatePayableTotal()">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tax">PPN</label>
                            <div class="input-group">
                                <input type="number" name="tax" id="tax" class="form-control" value="0" onchange="calculatePayableTotal()">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total">Total Bayar</label>
                            <input type="text" name="total" id="total" class="form-control" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pay">Dibayar</label>
                            <input type="number" name="pay" id="pay" class="form-control" value="0" onchange="calculateChange()">
                        </div>
                        <div class="form-group">
                            <label for="change">Kembali</label>
                            <input type="text" name="change" id="change" class="form-control" value="0" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success form-control">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    let rowNumber = 1;

    function addRow() {
        let newRow = document.querySelector('#row_1').cloneNode(true);

        newRow.id = `row_${++rowNumber}`;
        newRow.querySelector('select[name="product_id[]"]').setAttribute('onchange', fetchPrice(rowNumber));
        newRow.querySelector('input[name="qty[]"]').setAttribute('onchange', 'calculateTotal()');

        newRow.querySelector('input[name="qty[]"]').value = 1;
        newRow.querySelector('input[name="price[]"]').value = 0;
        newRow.querySelector('input[name="amount[]"]').value = 0;

        newRow.querySelector('button').classList.remove('btn-primary');
        newRow.querySelector('button').classList.add('btn-danger');
        newRow.querySelector('button').innerHTML = 'Hapus';
        newRow.querySelector('button').setAttribute('onclick', removeRow(rowNumber));

        document.getElementById('dynamic_rows').appendChild(newRow);
    }

    function removeRow(rowNum) {
        document.getElementById(`row_${rowNum}`).remove();

        calculateTotal();
    }

    function fetchPrice(rowNum) {
        let productId = document.querySelector(`#row_${rowNum} select[name='product_id[]']`).value;

        let price = 1000;

        document.querySelector(`#row_${rowNum} input[name='price[]']`).value = price;

        calculateTotal();
    }

    function calculateTotal() {
        let total = 0;

        document.querySelectorAll('.dynamic_row').forEach(row => {
            let qty = parseFloat(row.querySelector('input[name="qty[]"]').value);
            let price = parseFloat(row.querySelector('input[name="price[]"]').value);
            let amount = qty * price;

            row.querySelector('input[name="amount[]"]').value = amount.toFixed(0);
            total += amount;
        });

        document.getElementById('sub_total').value = total.toFixed(0);

        calculatePayableTotal();
    }

    function calculatePayableTotal() {
        let subTotal = parseFloat(document.getElementById('sub_total').value);
        let discount = parseFloat(document.getElementById('discount').value);
        let tax = parseFloat(document.getElementById('tax').value);
        let total = subTotal - (subTotal*discount/100) + (subTotal*tax/100);

        document.getElementById('total').value = total.toFixed(0);

        calculateChange();
    }

    function calculateChange() {
        let total = parseFloat(document.getElementById('total').value);
        let pay = parseFloat(document.getElementById('pay').value);
        let change = pay - total;

        document.getElementById('change').value = change.toFixed(0);
    }
</script>
<?= $this->endSection() ?>
