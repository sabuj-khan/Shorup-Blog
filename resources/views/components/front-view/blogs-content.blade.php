<div class="services_section layout_padding">
   <div class="container">
      <h1 class="services_taital">Our Blogs</h1>
      <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
      <div class="services_section_2">
         <div class="row" id="allPost">
           <!-- Blog posts will be appended here -->
         </div>
         <div class="d-flex justify-content-center" id="paginationLinks">
           <!-- Pagination links will be appended here -->
         </div>
      </div>
   </div>
</div>


<script>
   
       getBlogPosts();

       async function getBlogPosts(page = 1) {
           let response = await axios.get(`/get-allpost?page=${page}`);

           let allPost = $("#allPost");
           let paginationLinks = $("#paginationLinks");

           allPost.empty();
           paginationLinks.empty();

           response.data.data.forEach((item, index) => {
               let row = `<div class="col-md-4 my-2">
                           <div><img src="${item.image}" class="services_img"></div>
                           <p><b>Author:</b><i>${item.user.name}</i>; <b>Category:</b><i>${item.category.name}</i></p>
                           <div class="btn_main"><a href="#">${item.title}</a></div>
                       </div>`;
               allPost.append(row);
           });

           // Generate pagination links
           response.data.links.forEach(link => {
               let label = link.label.replace('&laquo;', '«').replace('&raquo;', '»');
               let active = link.active ? 'active' : '';
               let disabled = link.url == null ? 'disabled' : '';
               let paginationItem = `<li class="page-item ${active} ${disabled}">
                                       <a class="page-link" href="#" data-url="${link.url}">${label}</a>
                                   </li>`;
               paginationLinks.append(paginationItem);
           });

           // Add click event to pagination links
           $('.page-link').on('click', function(event) {
               event.preventDefault();
               let url = $(this).data('url');
               if (url) {
                   let page = new URL(url).searchParams.get('page');
                   getBlogPosts(page);
               }
           });
       }
 
</script>





























































{{-- <div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Our Blogs </h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">
          <div class="row" id="allPost">

            
           


          </div>
       </div>
    </div>
 </div>


 <script>


    getBlogPosts();

    async function getBlogPosts(){
        let response = await axios.get('/get-allpost');

        let allPost = $("#allPost");

        allPost.empty();

        response.data['post'].forEach((item, index) => {
            let row = `<div class="col-md-4 my-2">
                        <div><img  src="${item['image']}" class="services_img"></div>
                        <p><b>Author:</b><i>${item['user']['name']}</i>; <b>Category:</b><i>${item['category']['name']}</i></p>
                        <div class="btn_main"><a href="#">${item['title']}</a></div>
                    </div>`;

                allPost.append(row);
            
        });

    }

   


 </script> --}}