@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-4">
                <div id="randomNumber" class="display-4 my-4" style="font-size: 10rem;"></div>

                @if(isset($number))
                    <div id="finalNumber" class="display-1 my-4 d-none">{{ $number }}</div>
                @endif

                <button id="drawButton" class="btn btn-primary my-2">数字を抽選する</button>
            </div>
        </div>
        <div id="selectedNumbersList" class="row mt-4">
            @for ($i = 1; $i <= 75; $i++)
                @if($i % 15 == 1 && $i != 1)
                    </div><div class="row">
                @endif
                @php
                    $isSelected = in_array($i, $selectedNumbers->pluck('number')->toArray());
                @endphp
                <div id="number-{{ $i }}" class="col d-flex justify-content-center align-items-center border
                @if($isSelected) bg-danger text-white @endif" style="height: 50px; font-size: 2rem;">{{ $i }}</div>
            @endfor
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.getElementById('drawButton').click();
        }
    });

    function markNumberAsSelected(number) {
        const numberElement = document.getElementById('number-' + number);
        if (numberElement) {
            numberElement.classList.add('bg-danger', 'text-white');
        }
    }

    function drawButtonClicked() {
        var randomNumberElement = document.getElementById('randomNumber');
        var interval = setInterval(function() {
            randomNumberElement.textContent = Math.floor(Math.random() * 75) + 1;
        }, 50);

        setTimeout(function() {
            clearInterval(interval);

            fetch('/bingo/draw-number')
                .then(response => response.json())
                .then(data => {
                    if (data.number) {
                        randomNumberElement.textContent = data.number;
                        markNumberAsSelected(data.number);
                        console.log("当選した数字: " + data.number);
                    } else {
                        randomNumberElement.textContent = data.message;
                    }
                });
        }, 2500);
    }

    document.getElementById('drawButton').addEventListener('click', drawButtonClicked);
    window.addEventListener('load', onPageLoad);
</script>
@endsection
