@extends('layouts.app')

@section('page_title', 'FAQ')

@section('content')
    <h1 class="text-2xl mb-6 md:text-3xl">Frequently Asked Questions</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
            <h2 class="text-xl mb-6 md:text-2xl">Who are you?</h2>
            <p>
                I'm a guy who's trying his best to help people find products for the cheapest without having to spend hours on Google searching for a particular product. I also want to help amazing Canadian vendors to get more visits and sales on their website.
            </p>
        </div>
        <div>
            <h2 class="text-xl mb-6 md:text-2xl">Why some vendors are not listed on Vapecrawl?</h2>
            <p>
                We haven't indexed all Canadian vendors because we don't know each of them yet. We already have a list of vendors to include very soon. Some of them requires to write extra code so it might take some time.
            </p>
        </div>
        <div>
            <h2 class="text-xl mb-6 md:text-2xl">I own a vape shop and would like to get listed</h2>
            <p>
                It's totally possible! Send us an email with your website URL and we'll check this out with you!
            </p>
        </div>
        <div>
            <h2 class="text-xl mb-6 md:text-2xl">Do you accept non-Canadians vendors?</h2>
            <p>
                No.
            </p>
        </div>
    </div>
@endsection
