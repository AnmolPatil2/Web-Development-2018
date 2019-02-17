

  document.addEventListener("DOMContentLoaded" , event => {
    const app =firebase.app();

    const db = firebase.firestore();

    // Reference the document
    const myPost = db.collection('project2').doc('posts');
    
    // Listen to realtime changes 
    myPost.onSnapshot(doc => {
    
      const data = doc.data();
      document.write( data.title);
    
    })
}
)









var fireheading = document.getElementById("Heading");

var firetext = firebase.database().ref.child("posts");

firetext.on("value",function(datasnaphot){
    fireheading.innerHTML = datasnaphot.val
})

// monitor progress
task.on('state_changed', snapshot => {
    console.log(snapshot)










