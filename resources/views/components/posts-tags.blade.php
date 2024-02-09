 @props(['tagsComp'])

 <ul {{ $attributes->merge(['class' => 'flex justify-center mt-8']) }}>
     @foreach (explode(',', $tagsComp) as $tag)
         <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
             <a href="/?tag={{ Str::lower(trim($tag)) }}">{{ Str::ucfirst($tag) }}</a>
         </li>
     @endforeach
 </ul>
