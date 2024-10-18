 <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="form-container">
                    <h2 class="mb-4">Add New Post</h2>
                    <form id="save-form">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="postTitle" name="title"  style="background-color: #33373E">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="postContent" name="content" rows="5" ></textarea>
                        </div>


                        {{-- <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div> --}}


                        <img class="" width="200" height="150" id="newImg" src="{{asset('assets/images/demo.jpg')}}"/>
                        <br/>

                        <label class="form-label">Image</label>
                        <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="postImg">




                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="postCategory" name="category_id" >
                                <option value="">Select a category</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Tags</label>
                            <select class="form-control" id="postTag" name="category_id" >
                                <option value="">Select Tag</option>
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label for="tags">Tags</label>
                            <input style="background-color: hsla(218, 10%, 22%, 0.007)" type="text" class="form-control custom-input" id="postTags" name="tags" placeholder="Enter tags separated by commas">
                        </div> --}}

                    </form>
                    
                    <button onclick="savePost()" class="btn btn-primary">Submit</button>
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

            $("#postCategory").append(option);
        });
    }

    fillTagOption();
    async function fillTagOption(){
        
        let response = await axios.get('/tag-shows')
       

        response.data['tag'].forEach(function(item){
            let option = `<option value="${item['id']}">${item['name']}</option>`

            $("#postTag").append(option);
        });
    }


    async function savePost(){
        let pTitle = document.getElementById('postTitle').value;
        let pContent = document.getElementById('postContent').value;
        let pCategoryId = document.getElementById('postCategory').value;
        let pTagsId = document.getElementById('postTag').value;
        let pImage = document.getElementById('postImg').files[0];

        if(pTitle.length == 0){
            errorToast('Title is required');
        }else if(pContent.length == 0){
            errorToast('Content is empty')
        }else if(pImage.length == 0){
            errorToast('Image is required')
        }else if(pCategoryId.length == 0){
            errorToast('Category is required')
        }else{
            let formData = new FormData();
            formData.append('title',pTitle);
            formData.append('content',pContent);
            formData.append('image',pImage);
            formData.append('category_id',pCategoryId);
            formData.append('tag_id',pTagsId);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let response = await axios.post('/posts-create', formData, config);
            if(response.status == 201 && response.data['status'] == 'success'){
            successToast(response.data['message']);
            document.getElementById("save-form").reset();
            
            setTimeout(function (){
                    window.location.href='/allpost'
                },500)

            }else{
            alert('something is wrong')
            }
        
        
        
        }
        
    }


</script>

  










