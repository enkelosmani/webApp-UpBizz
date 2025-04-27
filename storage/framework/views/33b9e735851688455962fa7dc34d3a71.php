<head>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</head>
<main class="flex-1 p-6 md:p-10 max-w-4xl mx-auto md:mx-0 md:ml-[22%] lg:ml-[25%] lg:mr-[25%]">
    <div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 p-8 md:p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-indigo-100">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <img
                class="w-16 h-16 rounded-full mr-5 border-4 border-indigo-400 object-cover shadow-lg transition-transform duration-300 hover:scale-105"
                src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg"
                alt="User Avatar"
            />
            <div class="flex flex-col">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 tracking-tight">Create a New Post</h2>
            </div>
        </div>

        <!-- Form -->
        <form action="<?php echo e(route('posts.store')); ?>" method="POST" enctype="multipart/form-data" id="postForm">
            <?php echo csrf_field(); ?>
            <!-- Title Input -->
            <div class="mb-8">
                <label for="title" class="block text-lg md:text-xl font-semibold text-gray-700 mb-3 tracking-wide">Your Thoughts</label>
                <textarea
                    name="title"
                    id="title"
                    rows="4"
                    class="w-full bg-white text-gray-800 px-6 py-4 rounded-2xl text-lg font-medium border border-gray-200 shadow-inner transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:border-indigo-500 resize-none placeholder-gray-400"
                    placeholder="What's on your mind?"
                    required
                ></textarea>
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm mt-2 italic"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Image Upload -->
            <div class="mb-10">
                <label for="image" class="block text-lg md:text-xl font-semibold text-gray-700 mb-3 tracking-wide">Add an Image (Optional)</label>
                <div class="relative group">
                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                        class="w-full text-gray-700 px-6 py-4 rounded-2xl border border-gray-200 bg-white shadow-inner transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:border-indigo-500 cursor-pointer file:mr-5 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 group-hover:shadow-md"
                    >
                    <span class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-500 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                    </span>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-2 italic"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- Image Preview -->
                <div id="imagePreview" class="mt-6 hidden">
                    <div class="relative w-full max-w-md mx-auto">
                        <img id="previewImg" src="#" alt="Image Preview" class="w-full h-72 object-cover rounded-2xl shadow-lg border-2 border-indigo-200">
                        <button
                            type="button"
                            id="removeImage"
                            class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-all duration-300 shadow-md hover:shadow-lg"
                        >
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <a
                    href="<?php echo e(route('posts.index')); ?>"
                    class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl text-lg font-semibold hover:bg-gray-300 transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-xl text-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-0.5 flex items-center gap-2"
                >
                    <span>Create Post</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</main>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const removeImageBtn = document.getElementById('removeImage');

        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageBtn.addEventListener('click', function () {
            imageInput.value = '';
            imagePreview.classList.add('hidden');
            previewImg.src = '#';
        });
    });
</script>
<?php /**PATH C:\Users\Enkel\Desktop\webapp-upBizz\resources\views/posts/create.blade.php ENDPATH**/ ?>