{{-- resources/views/admin/dashboard.blade.php --}}
@include('partials.header')

<section
    class="dashboard py-16 bg-cover bg-center min-h-screen"
    style="background-image: url('{{ asset('images/b img3.jpg') }}');"
>
    <div class="bg-white/70 backdrop-blur-sm rounded-xl max-w-2xl mx-auto p-10 shadow-lg">
        <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">
            Admin Dashboard
        </h2>

        <div class="border-b border-gray-300 w-3/4 mx-auto mb-8"></div>

        <div class="flex flex-col items-center space-y-5">

            <a href="{{ route('admin.product.upload') }}">
                <button class="block w-72 px-10 py-4 bg-blue-400 text-white font-bold text-lg rounded-lg shadow-md
                    hover:bg-blue-500 hover:-translate-y-1 transition">
                    Upload a product
                </button>
            </a>

            <a href="{{ route('admin.products') }}">
                <button class="block w-72 px-10 py-4 bg-blue-400 text-white font-bold text-lg rounded-lg shadow-md
                    hover:bg-blue-500 transition">
                    Manage products
                </button>
            </a>

            <a href="{{ route('admin.orders') }}">
                <button class="block w-72 px-10 py-4 bg-blue-400 text-white font-bold text-lg rounded-lg shadow-md
                    hover:bg-blue-500 hover:-translate-y-1 transition">
                    Check orders
                </button>
            </a>

            <a href="{{ route('admin.customers') }}">
                <button class="block w-72 px-10 py-4 bg-blue-400 text-white font-bold text-lg rounded-lg shadow-md
                    hover:bg-blue-500 hover:-translate-y-1 transition">
                    Customers
                </button>
            </a>

            <a href="{{ route('admin.sales-report') }}">
    <button class="block w-72 px-10 py-4 bg-blue-400 text-white font-bold text-lg rounded-lg shadow-md
        hover:bg-blue-500 hover:-translate-y-1 transition">
        Generate Sales Report
    </button>
</a>


        </div>

        <div class="border-b border-gray-300 w-3/4 mx-auto mt-8"></div>
    </div>
</section>

@include('partials.footer')
