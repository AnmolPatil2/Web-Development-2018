let doorImage1=document.getElementById('door1');
let doorImage2=document.getElementById('door2');
let doorImage3=document.getElementById('door3');
const startButton=document.getElementById('start');

let numClosedDoors=3;

let openDoor1;
let openDoor2;
let openDoor3;
let currentlyPlaying=true;


const beachDoorPath='Images/dog.jpeg';
const spaceDoorPath="Images/cat.jpeg";
let botDoorPath="Images/panda.jpeg";
const closedDoorPath="https://s3.amazonaws.com/codecademy-content/projects/chore-door/images/closed_door.svg";



const isBot=(door)=>{
  if(door.src===botDoorPath){
    return true;
  }
  else{
    return false;
  }
  
}
const isClicked=(door)=>{
  if(door.src===closedDoorPath){
    return false; 
  }
  else{
    return true;
  }
}

const playDoor=(door)=>{
  if(isBot(door)){
    
    gameOver();
  }
  else {
  numClosedDoors = numClosedDoors - 1;
  
  if(numClosedDoors===1){
    gameOver('win');
  }
  }
  
}

const randomChoreDoorGenerator=()=>{
  let choreDoor=Math.floor(Math.random()*numClosedDoors);

if(choreDoor===0){
 openDoor1=botDoorPath;
  openDoor2=spaceDoorPath;
  openDoor3=beachDoorPath;
}
else if((choreDoor===1)){
   openDoor2=botDoorPath;
         openDoor3=spaceDoorPath;
  openDoor1=beachDoorPath;
}
else{
   openDoor3=botDoorPath;
         openDoor1=spaceDoorPath;
  openDoor2=beachDoorPath;
}
}


door1.onclick=()=>
{
 
  if(!isClicked(doorImage1) && currentlyPlaying ){
    doorImage1.src=openDoor1;
    playDoor(doorImage1);
  }
}


door2.onclick=()=>{
 
  if(!isClicked(doorImage2) && currentlyPlaying){
    doorImage2.src=openDoor2;
     playDoor(doorImage2);
    
  }
}
door3.onclick=()=>{
  
  
  
  if(!isClicked(doorImage3) && currentlyPlaying){ doorImage3.src=openDoor3;
    playDoor(doorImage3);
  }
}
startButton.onclick=()=>{
  startRound();
}
const startRound=()=>{
  if(currentlyPlaying===false)
 { numClosedDoors=3;
  startButton.innerHTML="Good luck!";
  doorImage1.src="https://s3.amazonaws.com/codecademy-content/projects/chore-door/images/closed_door.svg";
  doorImage2.src="https://s3.amazonaws.com/codecademy-content/projects/chore-door/images/closed_door.svg";
  doorImage3.src="https://s3.amazonaws.com/codecademy-content/projects/chore-door/images/closed_door.svg";
  currentlyPlaying=true;
  randomChoreDoorGenerator();
 }

  
}

const gameOver=(status)=>{
  if(status==='win'){
  startButton.innerHTML="You win! Play again?";
  }
  else{
    startButton.innerHTML="Game Over! Play again?";
  }
  currentlyPlaying=false;
}

randomChoreDoorGenerator();
startRound();












