<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .profile-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(135deg, #ffffff, #f8fafc);
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        .delete-btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .delete-btn:hover {
            background-color: #b91c1c;
            transform: scale(1.1);
        }
        .post-image {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            aspect-ratio: 4 / 3; /* Ensure consistent image proportions */
            animation: fadeIn 0.5s ease-in-out;
        }
        .post-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .avatar-container {
            transition: transform 0.3s ease;
        }
        .avatar-container:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-navy-900 min-h-screen">
<div class="flex w-screen h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 h-full bg-white shadow-lg overflow-y-auto">
        @include('posts.leftside')
    </aside>
    <!-- Main Content -->
    <main class="flex-1 flex flex-col items-center p-4 sm:p-6 md:p-8 overflow-y-auto">
        <div class="relative flex flex-col items-center rounded-[30px] w-full max-w-[1200px] mx-auto p-6 sm:p-8 md:p-10 bg-white bg-clip-border shadow-2xl profile-card dark:!bg-navy-800 dark:text-white">
            <!-- Banner -->
            <div class="relative flex h-48 sm:h-56 md:h-64 w-full justify-center rounded-2xl bg-cover overflow-hidden">
                <img src="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/media/banner.ef572d78f29b0fee0a09.png" class="absolute h-full w-full object-cover rounded-2xl" alt="Banner">
                <div class="absolute -bottom-16 sm:bottom-20 flex h-[120px] w-[120px] sm:h-[140px] sm:w-[140px] items-center justify-center rounded-full border-[6px] sm:border-[8px] border-white bg-indigo-500 dark:!border-navy-700 shadow-lg avatar-container">
                    <img class="h-full w-full rounded-full object-cover" src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg" alt="User Avatar" />
                </div>
            </div>
            <!-- User Info -->
            <div class="mt-20 sm:mt-24 md:mt-28 flex flex-col items-center">
                <h4 class="text-3xl sm:text-4xl font-bold text-navy-700 dark:text-black">{{ $user->name }}</h4>
            </div>
            <!-- Stats -->
            <div class="mt-8 mb-6 sm:mt-10 sm:mb-8 flex gap-12 sm:gap-20">
                <div class="flex flex-col items-center justify-center">
                    <p class="text-3xl sm:text-4xl font-bold text-navy-700 dark:text-black">{{ $user->posts->count() }}</p>
                    <p class="text-base sm:text-lg font-normal text-gray-600">Posts</p>
                </div>
            </div>
            <!-- Post Images -->
            <div class="mt-8 sm:mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                @forelse($user->posts as $post)
                    @if($post->content && $post->content->data)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $post->content->data) }}" alt="Post Image" class="w-full h-auto object-cover rounded-xl post-image">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="absolute top-2 right-2 sm:top-3 sm:right-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn bg-red-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded-full text-xs sm:text-sm font-medium hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this image?')">
                                    X
                                </button>
                            </form>
                        </div>
                    @endif
                @empty
                    <p class="col-span-1 sm:col-span-2 md:col-span-3 text-center text-gray-600 text-lg sm:text-xl">No posts available.</p>
                @endforelse
            </div>
        </div>

    </main>
</div>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            if (!confirm('Are you sure you want to delete this image?')) {
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>
