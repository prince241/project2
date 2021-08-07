@if ($paginator->lastPage() > 1)
<section id="ecommerce-pagination">
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-2">
                    <li class="page-item prev-item"><a class="page-link" href="{{ $paginator->url(1) }}">
                            <i class="feather icon-chevron-left"></i>
                        </a></li>
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item next-item"><a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}">
                            <i class="feather icon-chevron-right"></i>
                        </a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endif