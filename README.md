# CakePHP behavior to add position coordinates (latitude, longitude) to any table.

## Installation
You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).
```
composer require mixable/cakephp-locatable
```

## Enable plugin
To enable the plugin, just load the plugin using `bin/cake`:
```
bin/cake plugin load Locatable
```

## Import database structure
The migrations of this plugin provide the required database structure.
```
bin/cake migrations migrate -p Locatable
```

## Usage
To use the plugin, simply add the Locatable behavior to your table.
```php
$this->addBehavior('Locatable.Locatable');
```
This will add a `hasOne Cocrdinates` association to your model.

### Accessing data
The associated data is available as `Coordinate` entity and can be accessed at:
```php
$model->coordinate->latitude;
$model->coordinate->longitude;
```

### Saving data
Saving the hasOne data is done in the known way of saving associated data. In your view just use the Form helper:
```php
$this->Form->control('coordinate.latitude');
$this->Form->control('coordinate.longitude');
```
