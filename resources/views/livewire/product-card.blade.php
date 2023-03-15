<div class="product-item__outer h-100">
    <div class="product-item__inner px-xl-4 p-3">
        <div class="product-item__body pb-xl-2">
            <div class="mb-2"><a href="/product/{{$product->id}}" class="font-size-12 text-gray-5">{{ $product->category->name }}</a></div>
            <h5 class="mb-1 product-item__title"><a href="/product{{$product->id}}"
                    class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
            <div class="mb-2">
                <a href="/product/{{$product->id}}" class="d-block text-center">

                    @if ($product->images->count() > 0)
                        <img class="img-fluid" style="width:150px;" src="/storage/{{ $product->images[0]->image }}" alt="Image Description">
                    @else
                        <img class="img-fluid" src="/storage/default.png" alt="Image Description">
                    @endif


            </div>
            <div class="flex-center-between mb-1">
                <div class="prodcut-price">
                    <div class="text-gray-100">
                        {{ $product->getMainPrice()->currency->symbol }}{{ $product->getMainPrice()->price }}</div>
                </div>
                <div class="d-none d-xl-block prodcut-add-cart">
                    <a href="/product/{{$product->id}}" class="btn-add-cart btn-primary transition-3d-hover"><i
                            class="ec ec-add-to-cart"></i></a>
                </div>
            </div>
        </div>
        <div class="product-item__footer">
            <div class="border-top pt-2 flex-center-between flex-wrap">

            </div>
        </div>
    </div>
</div>
