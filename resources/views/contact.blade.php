@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <section id="contact" class="min-h-screen bg-gray-100 py-20 px-6 flex flex-col justify-center">
        <div class="max-w-6xl mx-auto text-center">
            <h3 class="text-4xl font-bold text-gray-800 mb-6">Get in Touch</h3>
            <p class="text-gray-600 max-w-2xl mx-auto mb-10">
                Need assistance or have a question about your booking? Our team is here to help — contact us anytime.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 p-4 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 4H8m8-8H8m16 8V5a2 2 0 00-2-2H6a2 2 0 00-2 2v14l4-4h12a2 2 0 002-2z"/></svg>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Email</h4>
                    <p class="text-gray-600">info@4acarrental.com</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 p-4 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m0 4h3m2 4H6m6 4h2m4 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2m16-2h-4"/></svg>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Phone</h4>
                    <p class="text-gray-600">+63 912 345 6789</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 p-4 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" /></svg>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Address</h4>
                    <p class="text-gray-600">123 Main Street, Manila, Philippines</p>
                </div>
            </div>
        </div>
    </section>
@endsection
