document.addEventListener('DOMContentLoaded',event=> {
    const app =firease.app();
    console.log(app);
});

function googleLogin() {
    const provider = new firebase.auth.GoogleAuthProvider();
    
    firebase.auth().signInWithPopup(provider)
        
            .then(result => {
                const user = result.user;  
                document.write(`Hello ${user.displayName}`)  ;
                console.log(user)    
            })  
            .catch(console.log)
            const db = firebase.firestore();

// Reference the document
const myPost = db.collection('products').doc('CGl2Obsqagfm1DguguLS');

// Listen to realtime changes 
myPost.onSnapshot(doc => {

  const data = doc.data();
  document.write(data.title + `<br>`);
  document.write(data.created + `<br>`)

})
}
