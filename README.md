## Introduction

This project gives different calculation options. Core classes are:
  - `Calculator`
  - `CalcualtorTest`
  
## Requirements

Needed 'software' on the computer are:

- composer

## Installing the game
Open a terminal and type at the desired location:
```
git clone git@github.com:gr8jen/Calculator.git
``` 
 Go to the root of this project:
```
cd Calculator/
```
Type the following command to install all the needed extra packages:
```
composer install
```

## Possible commands

To check the project itself for flaws you can run:

```
composer check-all
```

To check if the code still functions as required you can run:

```
composer unit
```

To check the code coverage distribution you can run:

```
composer coverage
```

And open the following in a browser:

```
tests/report/index.html
```