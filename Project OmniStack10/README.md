# Omni Stack Week 10 - First Day (13/01)

## What is app? 

This a app was developed in Omni Stack Week by Diego Fernandes (Rocketseat). 

The goal is develop a app that can find developers based in technologies they are using next to your localization. In desktop version, just is possible to register the users. In mobile version, have will a map with the developers found from your technologies. 

## Which languages/frameworks/features were used?
- Geolocalization API

- Java Script 

- React

- Node JS

## Which resources should be installed for develop this app? (for Windows)

- Install [Node.js 12.4.1 LTS](https://nodejs.org/en/) and after checking the instalation: 
```
$ node -v or npm -v
```
- Install [Chocolatelly](https://chocolatey.org/install) and after checking the instalation: 
```
$ choco -?
```
- Install [Yarn](https://yarnpkg.com/en/docs/install#windows-stable), you can do this with chocolatelly and check with:
```
$ yarn -v 
```
- Was used the [Visual Code](https://code.visualstudio.com/) for write the codes, by I used [Sublime](https://www.sublimetext.com/3) just 
for being lighter on my computer 

- Install [Insomnia](https://insomnia.rest/download/) for to do the requests (GET, POST, etc).

- The database will be create by [MongoDB](https://cloud.mongodb.com/).

# Omni Stack Week - Second Day (14/01)

## Application Architecture

![architeture](https://user-images.githubusercontent.com/46378210/72550799-44356a80-3872-11ea-8e88-7f48592fdeea.PNG)

## Steps in Windows 

On command prompt:

Create a directory 
```
$ mkdir appOmniStack/backend
```

Enter in this dir. and init a yarn (a new file packege.json will be criete)
```
$ cd appOmniStack/backend
$ yarn init -y
```

Open the node.js command promtp, enter in the **same directory** and write: 
```
$ yarn add express
```

Create a new file as [_index.js_](https://github.com/Diana-ops/omnistackweek). For execute the servidor, write:
```
$ node index.js
```

> Is possible to see the response of request acessing http://localhost:3333/

For stop requestion, wirte CTRL+C.

For observing the alterations while do you develop without to exit and enter the server, create:
```
$ yarn add nodemon -D
```

For execute, write:
```
$ yarn nodemon index.js
```
For connect the database with your application:
```
$ yarn add mongoose
```

