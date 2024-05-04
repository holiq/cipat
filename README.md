# Cipat

## Installation

```sh
git clone https://github.com/holiq/cipat.git
cd cipat
cp env .env
php spark key:generate
# setting database on .env
php spark migrate
php spark db:seed
# run server
php spark serve
```
