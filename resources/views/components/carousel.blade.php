@props(['slides' => []])
<div class="js-swiper swiper">
    <div class="swiper-wrapper">
        @foreach($slides as $slide)
            <div class="swiper-slide">
                @if(!empty($slide['image']))
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] ?? '' }}" class="w-full h-[60vh] md:h-[80vh] object-cover rounded-md">
                @endif
                <div class="mt-3 text-center">
                    @if(!empty($slide['title']))
                        <h3 class="text-xl font-semibold">{{ $slide['title'] }}</h3>
                    @endif
                    @if(!empty($slide['caption']))
                        <p class="text-sm text-gray-600">{{ $slide['caption'] }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination mt-4"></div>
    <button class="swiper-button-prev" aria-label="Anterior"></button>
    <button class="swiper-button-next" aria-label="Próximo"></button>
</div>
