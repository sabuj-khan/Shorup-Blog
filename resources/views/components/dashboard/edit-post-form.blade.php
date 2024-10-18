
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="form-container">
                <h2 class="mb-4">Add New Post</h2>
                <form id="update-form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="postUpdateTitle" name="title"  style="background-color: #33373E">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="postUpdateContent" name="content" rows="5" ></textarea>
                    </div>


                    {{-- <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div> --}}


                    <img class="" width="200" height="150" id="oldImg" src="{{asset('assets/images/demo.jpg')}}"/>
                    <br/>

                    <label class="form-label">Image</label>
                    <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="postupdateImg">




                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="posUpdatetCategory" name="category_id" >
                            <option value="">Select a category</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Tags</label>
                        <select class="form-control" id="postUpdateTag" name="category_id" >
                            <option value="">Select Tag</option>
                        </select>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="tags">Tags</label>
                        <input style="background-color: hsla(218, 10%, 22%, 0.007)" type="text" class="form-control custom-input" id="postTags" name="tags" placeholder="Enter tags separated by commas">
                    </div> --}}


                    <input type="text" class="d-none" id="updateID" placeholder="ID"> <br>
                    <input type="text" class="d-none" id="filePath" placeholder="File Path">

                </form>
                
                <button onclick="updatePost()" class="btn btn-primary">Update Post</button>
            </div>
        </div>
    </div>
</div>


<script>


fillCategoryOption();

    async function fillCategoryOption(){
        
        let response = await axios.get('/category-shows')
       

        response.data['category'].forEach(function(item){
            let option = `<option value="${item['id']}">${item['name']}</option>`

            $("#posUpdatetCategory").append(option);
        });
    }


    fillTagOption();
    async function fillTagOption(){
        
        let response = await axios.get('/tag-shows')
       

        response.data['tag'].forEach(function(item){
            let option = `<option value="${item['id']}">${item['name']}</option>`

            $("#postUpdateTag").append(option);
        });
    }

    fillupUpdatedForm();

    async function fillupUpdatedForm(){
        const id = sessionStorage.getItem('id');
        const path = sessionStorage.getItem('path');

        document.getElementById("updateID").value = id
        document.getElementById("filePath").value = path
        document.getElementById("oldImg").src     = path

        let response = await axios.post('/posts-by-id', {"id":id});

        document.getElementById("postUpdateTitle").value     = response.data['data']['title'];
        document.getElementById("postUpdateContent").value   = response.data['data']['content'];
        document.getElementById("posUpdatetCategory").value  = response.data['data']['category_id'];
        document.getElementById("postUpdateTag").value       = response.data['data']['tag_id'];        
    }


    async function updatePost(){
        let updateTitle    = document.getElementById("postUpdateTitle").value;
        let updateContent  = document.getElementById("postUpdateContent").value;
        let updateCategory = document.getElementById("posUpdatetCategory").value;
        let updateTag      = document.getElementById("postUpdateTag").value;

        let updateImage    = document.getElementById('postupdateImg').files[0];
        let updatePostId   = document.getElementById('updateID').value;
        let postOldImage   = document.getElementById('filePath').value;


        if(updateTitle.length == 0){
            errorToast('Post title is required');
        }else if(updateContent.length == 0){
            errorToast('Post content is required');
        }else if(updateCategory.length == 0){
            errorToast('Post category is required');
        }else if(updateTag.length == 0){
            errorToast('Post tag is required');
        }else{
            let formData = new FormData();
            formData.append('title', updateTitle);
            formData.append('content', updateContent);
            formData.append('image', updateImage);
            formData.append('category_id', updateCategory);
            formData.append('tag_id', updateTag);
            formData.append('id', updatePostId);
            formData.append('file_path', postOldImage);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let response = await axios.post('/posts-update', formData, config);

            if(response.status == 200 && response.data['status'] == 'success'){
                successToast(response.data['message']);
                document.getElementById("update-form").reset();
                //await getPostList();
                sessionStorage.removeItem('id');  // Remove the id
                sessionStorage.removeItem('path');  // Remove the path
                
                setTimeout(function (){
                    window.location.href='/allpost'
                },500)

            }else{
                errorToast(response.data['message']);
            }



        }
        
    }






</script>