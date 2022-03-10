document.getElementById('getText').addEventListener('click',getText);
document.getElementById('getUsers').addEventListener('click',getUsers);
document.getElementById('getPosts').addEventListener('click',getPosts);
document.getElementById('addPost').addEventListener('submit',addPost);
function getText(){
    // console.log(123);
    // fetch('sample.txt')
    // .then(function(res){
        
    //     return (res.text())
    // }).then(function($data){
    //     console.log($data);
    // });
    fetch('sample.txt')
    .then(res => res.text()).then((data) =>{
        // console.log(data);
        document.getElementById('output').innerHTML = data
    })
    .catch((err)=>console.log(err))
}
function getUsers(){
   fetch('users.json').then(res => res.json()).then((data) =>{
    //    console.log(data);
    let output ='<h2>Users</h2>';
    data.forEach(function(user){
            console.log(user)
        output +=`
        <ul class="list-group mb-3">
            <li  class="list-group-item">ID:${user.id}</li>
            <li class="list-group-item">NAME:${user.name}</li>
            <li class="list-group-item">EMAIL:${user.email}</li>
        </ul>
        `;
    });
    document.getElementById('output').innerHTML=output;
   })
}
function getPosts (){
fetch('https://jsonplaceholder.typicode.com/posts')
.then((res)=> res.json())
.then((data) =>{
      //    console.log(data);
      let output ='<h2 class="mb-4">Posts</h2>';
    data.forEach(function(post){
            console.log(post)
        output +=`
        <div class="card card-body">
            <h3>${post.title}</h3>
            <h3>${post.body}</h3>
        </div>
        
        `;
    });
    document.getElementById('output').innerHTML=output;
   })
}
function addPost(e){
   e.preventDefault();
   let title = document.getElementById('title').value;
   let body = document.getElementById('body').value;

   fetch('https://jsonplaceholder.typicode.com/posts',{
       method: 'POST',
       headers: {
           'accept': 'application/json, text/plain, */*',
           'content-type': 'application/json'
       },
    body: JSON.stringify({title: title, body: body})
   })
   .then((res)=>res.json())
   .then((data)=>console.log(data))
}