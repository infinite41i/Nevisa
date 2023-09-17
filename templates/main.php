<div class="flex justify-center">
    <div class="w-11/12 md:w-9/12">
        <div id="slider" class="flex place-content-center my-2 relative">
            <img src="<?php echo $ROOT ?>assets/130-1000x430.jpg" alt="" class="w-full h-60 object-cover">
            <div class="absolute bottom-5 text-center">
                <div class="text-lg">Text on image</div>
                <div>Description</div>
            </div>
        </div>
        <div id="posts">
            <span class="text-2xl">Posts</span>
            <div class="max-h-10 space-y-4">
                <?php for($i=0; $i<5; $i++){?>
                <div class="post flex flex-col md:flex-row flex-nowrap shadow-xl overflow-hidden rounded-lg transition ease-in-out hover:shadow-2xl">
                    <div class="post_img">
                        <img src="<?php echo $ROOT ?>assets/514-200x300.jpg" alt=""
                        class="object-cover w-full h-36 md:h-52 md:w-96">
                    </div>
                    <div class="flex flex-col px-4 py-3">
                        <div class="post_title text-3xl">Post Title</div>
                        <div class="post_date">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur iure repellendus voluptatibus! Tenetur animi iusto aliquid perspiciatis, minima quos quae provident beatae placeat quisquam, repellat ducimus, architecto distinctio. Dolorem, molestias....</div>
                        <div class="post_author text-slate-600">Author: Ali</div>
                        <div class="post_date text-slate-600">Date: Yesterday</div>
                    </div>
                    <a href="./posts/1"
                    class=" post_more flex justify-center items-center
                            bg-gradient-to-tr from-blue-600 to-sky-600 
                            text-slate-200 text-lg
                            h-12 md:h-auto md:w-60
                            ">
                            <div class="">Read more</div>
                    </a>
                </div>
                <?php } ?>
                &nbsp;
            </div>
        </div>
        &nbsp;
    </div>
</div>