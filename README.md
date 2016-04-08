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

$encryPaste = new EncryPaste; // Initiate the EncryPaste Class

$encryPaste->executeEncry("data_to_encrypt", "key"); // Call main function with 2 params: data and key.

```

That's all you need! The index.php is compiled with many additions including validations and code. 


Changelog
=========

```
EncryPaste - V2 FINAL - 08/04/2016
  - listings.php now added to see overview of all submits.
  - MCrypt fixed.

EncryPaste - V1 FINAL - 02/10/2014
  - Changed random URL generation method. => Added ./includes/generate.use.php
  - Improvements to encrypaste.class.php

EncryPaste - BETA 1 - 29/09/2014
  - Initial release
  
```
