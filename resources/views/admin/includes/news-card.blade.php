<div class="col mb-3">

        <div class="media border rounded bg-light p-3" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);">
            <img src="{{ asset('images/news/' . $n->image) }}" class="mr-3" alt="{{ $n->title }}">
            <div class="media-body">
                <h5 class="mt-0">
                    <a href="{{ route('admin.news.show', $n) }}">{{ $n->title }}</a>
                </h5>
                {{ $n->description }}
                <p><span class="text-bold text-secondary">{{ $n->created_at->format('M d Y') }}</span><br/>
                <a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></p>
                <a href="{{ route('admin.news.edit', $n ) }}" class="btn bg-warning text-dark">
                    {{ __('elements.button.editNews') }}</a>
                <form method="post" action="{{ route('admin.news.destroy', $n ) }}"
                      class="d-inline" onsubmit="getConfirm()">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger pointer">
                        {{ __('elements.button.deleteNews')}}</button>
                </form>
            </div>

        </div>


</div>