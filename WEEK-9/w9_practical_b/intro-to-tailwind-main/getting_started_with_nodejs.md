# Getting Started with Node.js

## If you are using a USB

- Go to https://nodejs.org/en/download/prebuilt-binaries and click the green download button.
- Unzip the downloaded file onto your USB stick.
- Rename the folder 'node' (it will make it easier later)
  - This node folder should be in the root of your USB.
  - Inside this folder there should be a 'node.exe' file.
- Open the XAMPP Control Panel
- Open the XAMPP shell
- Enter the following command to add Node.js to the path. This will make it accessible whenever we use the XAMPP shell

```
set PATH=\node;%PATH%
```

- Close the shell
- To make sure this has worked, open the shell again and enter the following

```
node -v
```

and then

```
npm -v
```

If successful, these commands should simply list the version numbers of Node and NPM.

## If you are using your own PC

- Go to https://nodejs.org/en
  - Click the big download button
  - Run the downloaded .exe file.
    - Accept the license agreement
    - Install the necessary tools
- To make sure this has worked, open a terminal and enter the following:

```
node -v
```

and then

```
npm -v
```

If successful, these commands should simply list the version numbers of Node and NPM.

## If you are on a Mac

- I can't test this but there should be an OSX version at https://nodejs.org/en
