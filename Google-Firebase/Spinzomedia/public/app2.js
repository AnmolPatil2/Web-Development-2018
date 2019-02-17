

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



const db = firebase.firestore();

// Reference the document
const myPost = db.collection('project2').doc('posts');

// Listen to realtime changes 
myPost.onSnapshot(doc => {

  const data = doc.data();
  document.write(data.add + `<br>`);

})


logout.onclick=()=>
{
    firebase.auth().signOut().then(function() {
        // Sign-out successful.
      }).catch(function(error) {
        // An error happened.
      });
}