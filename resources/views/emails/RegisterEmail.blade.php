@component('mail::message')
# Introduction

Helllo this is Mayank

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
