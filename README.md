EncryPaste
==========

EncryPaste - Encryption Pastebin made in PHP, utilizes MySQL (PDO functions).

Installation
=============
**Make sure that `php-mycrypt` is installed, otherwise you will not be able to paste!**  
To intsall EncryPaste, load up `./install.php` and the instructions to install will be listed in there.
It is strongly advised that you remove the install.php file once you're done installing.

Usage
=======

```php
include("includes/encrypaste.class.php");

$encryPaste = new EncryPaste; // Initiate the EncryPaste Class

$encryPaste->executeEncry("data_to_encrypt", "key"); // Call main function with 2 params: data and key.

```

That's all you need! The index.php is compiled with many additions including validations and code. 

Status
======

Current status: Released <a href="https://github.com/redrails/EncryPaste/releases/tag/v1">V1</a>.

Changelog
=========

```
EncryPaste - V1 FINAL - 02/10/2014
  - Changed random URL generation method. => Added ./includes/generate.use.php
  - Improvements to encrypaste.class.php

EncryPaste - BETA 1 - 29/09/2014
  - Initial release
  
```
