@extends('website.layouts.app')
@section('title', 'Contact')
@section('content')

       <!-- Main Content -->
    <main class="flex-grow flex items-start pt-24">
        <section class="intro py-8 px-4 mx-auto max-w-3xl flex flex-col md:flex-row w-full">
            <!-- Left Content -->
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-3xl font-bold mb-6">Contact MixiShop</h2>
                <div class="text-lg mb-4">
                    <strong>Address:</strong> Hoa Vang, Da Nang
                </div>
                <div class="text-lg mb-4">
                    <strong>Phone number:</strong> 0905076967
                </div>
                <div class="text-lg mb-4">
                    <strong>Email:</strong> <a href="mailto:khoadm.23it@vku.udn.vn" class="text-blue-600 underline">khoadm.23it@vku.udn.vn</a>
                </div>
            </div>

            <!-- Right Content (Google Map) -->
            <div class="md:w-1/2 flex justify-center">
                <div class="h-96 w-full">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.6687513674888!2d108.13647277495318!3d15.987848084679914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421d180086551d%3A0x15416f11e3546c8c!2zVHJ1bmcgdMOibSBow6BuaCBjaMOtbmggaHV54buHbiBIb8OgIFZhbmc!5e1!3m2!1svi!2s!4v1729338987230!5m2!1svi!2s"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </main>
@endsection
