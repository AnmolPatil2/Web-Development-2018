firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
      document.getElementById("user_div").style.display="block";
      document.getElementById("Login_div").style.display="none";

    } else {
      // No user is signed in.
      document.getElementById("Login_div").style.display="block";
      document.getElementById("user_div").style.display= "none";

    }
  });


login.onclick=()=>{
    
    var userEmail=document.getElementById("email_field").value;
    var userPassword=document.getElementById("password_field").value;
    firebase.auth().signInWithEmailAndPassword(userEmail, userPassword).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...
      });
     
}
logout.onclick=()=>
{
    firebase.auth().signOut().then(function() {
        // Sign-out successful.
      }).catch(function(error) {
        // An error happened.
      });
}
var mainText =document.getElementById("maintext");
var submit = document.getElementById("submitButton");



submitButton.onclick=()=>{
    var firebaseref = firebase.database().ref();
    var message=mainText.value;
    firebaseref.child("posts").set(message);
}


function uploadFile(files) {
    const storageRef = firebase.storage().ref();
    const imgRef = storageRef.child('IMG_20180704_190232295_LL.jpg');

    const file = files.item(0);

    const task = imgRef.put(file)

    // successful upload
    task.then(snapshot => {
        const url = snapshot.downloadURL
        document.querySelector('#imgUplaod').setAttribute('src', url)
    })

    
}












