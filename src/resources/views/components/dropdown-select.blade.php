<div class="dropdown">
        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
            </svg>
        </button>
    <ul class="dropdown-menu">
        @foreach($attributes as $attribute)
            <li>
                @if(isset($attribute['verb']) && $attribute['verb'] == 'destroy')
                    <a
                        class="dropdown-item action-dropdown dropdown-delete"
                        href=""
                        onclick="confirmDelete('{{ $attribute['link'] }}', this)">
                        {{ $attribute['label'] }}
                    </a>
                @else
                    <a
                        class="dropdown-item action-dropdown" 
                        @if($attribute['link'])
                            href="{{ $attribute['link'] }}"
                        @else
                            action="submit"
                        @endif>
                        {{ $attribute['label'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</div>

@vite(['resources/js/controllers/dropdownController.js'])


<script>
    function confirmDelete(delete_resource_url, elem)
    {
        var confirmation = confirm("Você realmente deseja apagar este item?");
    
        if (confirmation == true)
        {
            axios.delete(delete_resource_url).then((response) => {
            }).catch((error) => {
            });
        }
    }
</script>
