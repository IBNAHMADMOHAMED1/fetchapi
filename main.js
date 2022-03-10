document.getElementById('getText').addEventListener('click',getText);
document.getElementById('getUsers').addEventListener('click',getUsers);
document.getElementById('getPosts').addEventListener('click',getPosts);
document.getElementById('addPost').addEventListener('submit',addPost);

const renderPost =(data)=>{
    let output ='<h2>Category</h2>';
    data.forEach(function(user){
        console.log(user)
    output +=`
    <ul class="list-group mb-3">
        <li  class="list-group-item">ID:${user.id}</li>
        <li class="list-group-item">NAME:${user.name}</li>
        <li class="list-group-item">Created At:${user.created_at}</li>
    </ul>
    `;
});
document.getElementById('output').innerHTML=output;
}
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
   fetch('http://localhost/php_myBlog/api/category/read.php').then(res => res.json()).then((data) =>{
    //    console.log(data);
    
    renderPost(data)
   })
}
function getPosts (){
fetch('http://localhost/FETCHAPI/api/post/read.php')
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
            <h3>${post.author}</h3>
            <h3>${post.category_name}</h3>
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
   let author =document.getElementById('author').value;
   let category_id=1;

   fetch('http://localhost/FETCHAPI/api/post/create.php',{
       method: 'POST',
       headers: {
           'Accept': 'application/json, text/plain, */*',
           'content-type': 'application/json'
       },
    body: JSON.stringify({title, body,author,category_id})
   
   })
   .then((res)=>res.text())
   .then((data) => {
    //    data = JSON(data)
    console.log(data);
    // const dataArr =[];
    // dataArr.push(data);
    // // renderPost(dataArr)
    // console.log(dataArr);
   })
}