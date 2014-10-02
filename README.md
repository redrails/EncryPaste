EncryPaste
==========

EncryPaste - Encryption Pastebin made in PHP, utilizes MySQL (PDO functions).

Installation
=============
To intsall EncryPaste, load up <font color="green"> install.php </font> and the instructions to install will be listed in there.
It is strongly advised that you remove the install.php file once you're done installing.

Usage
=======

```php
include("includes/encrypaste.class.php");

$encryPaste = new EncryPaste;     // Initiate the EncryPaste Class

$encryPaste->executeEncry("data_to_encrypt", "key");    // Call the main function with 2 params: data and key.

```

That's all you need! The index.php is compiled with many additions including validations and code. 


Changelog
=========

```
EncryPaste - v1 - 29/09/2014
- Initial release
```
