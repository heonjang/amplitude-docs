<?php

namespace AltDesign\AltSitemap;

use AltDesign\AltSitemap\Events\Sitemap;

use Illuminate\Support\Facades\Event;
use Statamic\Facades\CP\Nav;
use Statamic\Facades\Permission;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'web' => __DIR__ . '/../routes/web.php',
        'cp' => __DIR__ . '/../routes/cp.php',
    ];

    public function addToNav()
    {
        Nav::extend(function ($nav)
        {
            $nav->content('Alt Sitemap')
                ->section('Tools')
                ->can('view alt-sitemap')
                ->route('alt-sitemap.index')
                ->icon('<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600"><defs><style>.cls-1{fill:#3c3c3c;fill-rule:evenodd;stroke-width:0px;}</style></defs><path class="cls-1" d="m150.46,413.81c2-3.82,3.3-7.2,5.04-11.46,1.61-3.93,2.83-8.05,4.12-11.85,4.46-10.1,7.5-20.02,11.53-30.06.05-.41.18-.84-.33-1.17,1.2-1.48,1.96-3.23,2.61-5.05,2.76-7.62,4.96-15.62,7.4-23.42,1.33-4.25,3.65-8.19,4.36-12.58,5.95-17.03,12.39-34.12,17.85-51.25,1.17-3.68,3.17-7.07,4.45-10.68.54-1.51.9-2.55,1.68-4.22,1.81-3.89,1.7-7.96,4.7-11.41.36-.9-.25-.59-.19-1.37,3.54-9.17,7.47-18.39,10.49-27.49-11.07,12.6-17.57,29.61-27.71,41.3-.54-.15-1.04,0-1.65-.64.38,1.72-.99.13-2.05.28-.54.08-.96.88-1.27.87-.03,0-.98-1.44-1.46-.5-.77-1.4-.28-2.97-.26-4.48,3.85-5.09,4.22-11.39,8.32-15.38.64-.5-.44-.75,0-1.22,12.21-18.83,26.12-43.48,39.57-61.34,4.33-5.75,8.64-7.48,14.39-4.05-1.03.72-.31,1.2-.11,1.75-.13.95-1.68,2.08-1.34,2.96,1.04.89,2.54,2.01,2.9,3.43-1.21,2.08-.81,3.93-2.13,6.02.79,3.62-1.97,6.45-3.18,9.82-1.41,3.92.87,8.45-.95,12.11.58,6.93-.92,14.14-.76,21.12-1.9,3.46.26,7.42-.6,10.85-1.5,5.98-1.48,11.96-2.4,18.05.06.8.36,1.57.33,2.39-1.45,2.53-1.94,5.46-1.66,8.22-.53.77-.21-.05-.73-.25-.21,3.84-.82,8.36-5.19,11.65-1.92-1.35-2.3-4.63-2.1-6.49.07-.64.23-1.54.98-1.7-.98-.79-.45-1.79-1.4-2.59-.4-12.39.21-24.93-.06-37.34-2.59,3.47-2.49,7.99-3.97,11.66-.42,1.05-1.33,1.95-1.67,3.01-.21.63.18,1.46-.06,2.09-.38,1.02-1.35,1.7-1.72,2.67-.21.53.12,1.89-.16,2.63-.41,1.07-1.5,1.38-.7,2.53-1.53,3.25-2.3,5.49-4.49,9.12-2.3,3.81-2.39,9.23-5.05,13.89-.64,1.12-1.47,2.78-2.02,4.27-1.17,3.16-2.15,4.82-1.41,7.49-6.48,11.32-8.62,23.36-13.12,34.97-.17.95.12,1.84.03,2.78-.44.58-.88,1.16-1.33,1.74-.4,1.85.11,3.58-1.83,5.64-.43,3.9-1.31,6.99-3.72,10.93-2.53,4.14-3.72,10.53-5.5,15.69-.22.64-.68,1.33-.94,2.04-2.94,7.98-5.27,16.59-9.16,24.53.09.74-.34,1.55-.21,2.29-2.7,4.82-3.47,9.65-6.13,14.91-1.37,2.72-2.3,5.56-2.68,8.36-.41,2.95-1.76,6.95-3.29,9.51s-4.61,4.45-7.49,3.64c-1.47-.41-2.68-1.45-3.69-2.6-1.65-1.87-2.14-4.24-2.89-6.62Z"/><path class="cls-1" d="m440.69,384.32c-3.9-7.94-6.22-16.54-9.16-24.53-.26-.71-.71-1.4-.94-2.04-1.79-5.16-2.97-11.55-5.5-15.69-2.41-3.94-3.3-7.03-3.72-10.93-1.94-2.06-1.43-3.79-1.83-5.64-.44-.58-.89-1.16-1.33-1.74-.09-.94.2-1.83.03-2.78-4.5-11.61-6.64-23.65-13.12-34.97.74-2.67-.24-4.32-1.41-7.49-.55-1.49-1.38-3.15-2.02-4.27-2.66-4.67-2.75-10.08-5.05-13.89-2.19-3.64-2.96-5.88-4.49-9.12.8-1.14-.29-1.46-.7-2.53-.28-.74.04-2.1-.16-2.63-.37-.96-1.34-1.65-1.72-2.67-.24-.63.14-1.46-.06-2.09-.35-1.05-1.25-1.96-1.67-3.01-1.48-3.67-1.38-8.19-3.97-11.66-.27,12.41.34,24.95-.06,37.34-.95.8-.42,1.8-1.4,2.59.76.16.92,1.06.98,1.7.2,1.86-.18,5.13-2.1,6.49-4.37-3.29-4.97-7.81-5.19-11.65-.52.2-.2,1.02-.73.25.28-2.76-.21-5.69-1.66-8.22-.03-.81.27-1.58.33-2.39-.92-6.09-.9-12.07-2.4-18.05-.86-3.43,1.29-7.4-.6-10.85.15-6.98-1.34-14.19-.76-21.12-1.83-3.66.45-8.19-.95-12.11-1.2-3.36-3.97-6.2-3.18-9.82-1.32-2.09-.92-3.95-2.13-6.02.36-1.41,1.86-2.53,2.9-3.43.35-.88-1.21-2.02-1.34-2.96.2-.55.92-1.03-.11-1.75,5.75-3.44,10.05-1.71,14.39,4.05,13.46,17.86,27.37,42.51,39.57,61.34.45.47-.64.72,0,1.22,4.1,3.99,4.48,10.29,8.32,15.38.02,1.51.51,3.08-.26,4.48-.48-.94-1.43.5-1.46.5-.32,0-.73-.79-1.27-.87-1.06-.15-2.42,1.44-2.05-.28-.61.64-1.11.49-1.65.64-10.15-11.69-16.64-28.71-27.71-41.3,3.03,9.1,6.95,18.32,10.49,27.49.06.77-.54.46-.19,1.37,3,3.45,2.89,7.53,4.7,11.41.78,1.68,1.15,2.71,1.68,4.22,1.27,3.6,3.27,7,4.45,10.68,5.46,17.13,11.9,34.22,17.85,51.25.71,4.39,3.03,8.33,4.36,12.58,2.44,7.8,4.64,15.8,7.4,23.42.66,1.81,1.41,3.57,2.61,5.05-.51.34-.38.76-.33,1.17,4.03,10.05,3.32,10.78,7.79,20.88.88,1.99.63,4.24.32,6.39s-1.44,4.3-3.38,5.27c-.96.48-2.04.64-3.11.75-1.11.12-2.23.2-3.35.23-.56.02-1.17.01-1.63-.31-.53-.36-.74-1.03-.91-1.64-.87-3.08-.01-4.81-1.42-7.69Z"/><path class="cls-1" d="m419.69,51.05c1.17,1.32,2.21,2.35,3.42,3.8,1.47,1.76,3.02,4.14,4.56,6.27,1.97,2.73,3.4,5.65,4.18,9.69.48-.15,1.58,4.8,1.71,6.84.08,1.32-.63,2.76.19,3.8-1.05,2.79-1.09,6.25-2.28,9.69-.93,2.71-3.48,4.61-3.8,7.03-3.17,4.87-7.57,8.51-12.16,11.97-.61.21-1.13.52-1.9.57-.31.26-.21.94-.57,1.14-4.23,2.36-9.64,4.55-13.11,7.03-3.13.55-4.42,2.93-7.79,3.23-2.64,2.16-6.27,1.89-9.31,3.23-1.16.51-2.02,1.27-3.04,1.71-1.19.51-2.27.55-3.61.95-.75.22-1.37.9-2.09,1.14-1.07.36-2.33.26-3.42.57-1.41.4-2.81.91-4.18,1.33-1.43.44-2.78.57-4.18.95-.68.19-1.21.75-1.9.95-1.99.58-4.14.59-6.08,1.14-.87.24-1.6.94-2.47,1.14-1.81.4-4.05-.11-5.51,1.33-1.51-.32-4.37.3-5.7.19-5.09,2.08-14.11,2.13-21.09,3.04-2.15.28-5.38.89-7.41.38-5.21,2.02-12.82-.38-17.29,2.09-.94.18-.75-.77-1.33-.95-6.21-.72-12.82-1.03-18.43-1.71-1.79-.22-3.61-.04-5.13-.38-.66-.15-1.25-.67-1.9-.76-1.11-.15-2.27.21-3.42,0-1.94-.34-3.89-1.02-5.89-1.33-7.06-1.09-14.4-1.66-20.52-4.18-4.15-.04-7.78-2.47-11.78-3.42-1.45-.35-3-.29-4.37-.76-1.58-.55-3.29-1.56-4.94-2.28-3.21-1.39-6.62-2.28-9.69-3.8-2.06-1.02-4.17-2.54-6.27-3.8-4.16-2.49-6.76-5.13-10.26-8.36-4.62-4.27-8.67-9.78-11.4-15.96-1.47-2.05-3.69-5.91-3.99-9.12-2.22-2.75-2.29-7.98-2.85-10.45.06-.51.69-.44.76-.95-.09-.49-.56-.23-.57-1.14.01-2.33.79-3.99.57-6.65.88-1.15.49-3.56,1.9-4.18-.29-.6-.07-.84,0-1.52,4.17-7.92,9.56-12.61,17.67-17.1,4.39-2.42,8.66-3.9,13.49-5.89.79-.33,1.49-1.03,2.28-1.33,2.29-.89,4.74-1.28,7.03-2.09.73-.26,1.39-.86,2.09-1.14,1.37-.55,2.9-.65,4.37-1.14,3.87-1.29,8.11-2.19,12.16-3.61,9.82-2.12,20.92-4.05,32.11-5.13,1.56-.15,3.03-.6,4.56-.76,23.34-2.46,49.1-1.73,73.15.38.38.03,1.47-.03,1.33.57,8.18.46,15.89,1.8,23.75,3.23,17.81,3.24,36.18,6.23,48.27,15.39,2.4,2.2,2.77,6,2.09,9.12Zm-.95,46.93c2.39-2.17,4.46-4.65,6.84-6.84-.17-1.01.97-1.5,1.52-2.28.84-1.2,1.24-2.82,2.09-3.99.09-1.84.42-3.03.95-3.61.22-3.99-2.1-7.96-3.61-11.4-3.32-4.98-7.19-9.41-11.4-13.49-4.06-3.03-8.76-5.43-13.11-8.17-4.78-1.3-7.93-4.23-12.16-6.08-2.06.16-3-.79-4.37-1.33-5.2-2.15-10.45-4.25-16.72-5.32-1.61-1.48-4.69-.9-7.03-1.33-.49-.09-.87-.47-1.33-.57-2.44-.5-6.95-.71-9.88-1.52-1.37.03-2.65,0-3.99,0-7.45,0-14.89-2.31-22.23-1.71-3.45.28-6.77.88-10.45.38-.87-.48-1.84-.75-3.04-.57-5.24.79-12.79,1.6-18.81,1.52-1.42-.02-3.14-.49-4.37-.38-2.12.2-4.26,1.22-6.46,1.52-1.52.21-3.1,0-4.56.19-3.24.42-6.48,1.58-9.69,2.09-5.02.79-9.53,1.66-13.68,2.28-.4.17-.33.81-.95.76-3.85.84-7.28,2.09-11.78,2.28-2.35,2.19-6.68,2.53-9.88,3.8-.67.27-1.22.84-1.9,1.14-1.8.81-3.86,1.2-5.7,2.09-1.71.83-3.24,2.03-4.94,2.85-4.26,2.05-9.27,4.39-12.16,7.41-2.37.93-4.28,3.31-6.08,4.18-.64,1.7-2.13,2.56-3.42,3.61-1.02,1.77-1.86,3.71-3.23,5.13.23,1.51-.22,2.3-.95,3.42.31,1.54-.43,3.26-.76,4.75.86,1.18,0,5.69.95,5.51-.27,2.19,1.42,3.84,1.9,5.89,7.85,13.56,25.26,18.57,41.8,22.8,7.09,2.57,14.82,4.01,22.99,5.13,1.29.18,2.48.76,3.8.95,8.07,1.14,16.24,1.31,24.7,1.9,19.76,1.38,39.89.5,59.09-1.9,2.49-.31,5.12-.74,7.6-1.14,15.02-2.4,30.69-5.54,41.99-11.21,1.44-.72,3.01-1.2,4.37-1.9,2.17-1.11,4.03-3.05,5.89-4.56,2.01-1.63,4.19-2.94,6.08-4.56,1.76-2.68,4.07-4.8,6.08-7.22,0-1.08.72-2.23,1.52-3.04.27-1.49-.94-3.43-.95-4.94,0-.23.44-.54.38-.76-.18-.72-.93-1.33-1.14-2.09-.22-.8.03-1.83-.19-2.47-.28-.8-1.13-1.3-1.33-2.09-.21-.84-.13-2.62,1.33-2.66,4.32,4.86,6.01,14.29,3.42,21.28-1.76,1.98-3.43,4.05-4.75,6.46-.54.41-1.88.39-1.33,1.33,1.28.52,1.62-1.55,3.04-1.52Zm-200.08-57.57c-3.81,1.27-6.56,2.2-10.26,3.61-10.21,3.89-19.83,8.89-25.84,15.96-1.89,2.23-2.88,4.14-3.99,6.65-.61,1.36-1.49,2.92-1.71,3.99-.62,3.04-.4,5.51,0,7.79.14.79.02,1.71.19,2.47,1.36,6.1,5.86,12.51,8.93,16.34,4.11,5.13,10.03,10.27,15.96,13.68,4.09,2.35,9.04,3.84,13.11,6.08,2.32.44,4.47,1.82,6.84,2.47.92.25,1.95.12,2.85.38,1.93.55,3.6,1.75,5.51,2.28,1.89.52,3.36.79,4.75,1.14,9.19,2.32,19.06,4.1,29.07,5.7,4.91.79,9.73,1.69,14.63,2.09,14.56,1.2,29.27.94,43.32-1.33-3.11-.35-6.33-.02-9.5,0-2.26,0-4.38.48-6.65.38-1.08-.05-2.13-.56-3.23-.57-4.45-.03-8.88.22-13.3,0-5.88-.29-14.13-.67-19-1.33-1.57-.21-3.15-.77-4.75-.95-2.94-.33-5.82-.28-8.55-.76-1.42-.25-2.79-.84-4.18-1.14-1.76-.38-3.05-.96-3.99-1.14-.75-.15-1.55.09-2.28,0-1.68-.22-3.36-1.02-5.13-1.52-1.92-.55-3.99-.53-5.51-1.14-.61-.24-.91-.76-1.52-.95-1.44-.44-3-.44-4.37-.76-1.37-.32-2.49-.88-3.8-1.33-5.37-1.86-10.26-3.39-15.01-5.7-3.81-1.85-6.59-4.02-9.31-6.46-2.62-2.35-4.58-4.21-6.65-7.03-1.15-1.57-2.3-3.54-3.04-5.13-2.22-4.76-4.13-11.71-3.99-18.43.03-1.13.62-2.14.76-3.23.34-2.5.35-4.33,1.14-6.27.68-1.69,1.59-3.31,2.66-4.94,2.08-3.15,4.54-5.3,7.22-8.17,7.03-5.48,15.02-10.06,24.13-13.87.03-.23.34-.43,0-.57-2.08.51-3.7,1.11-5.51,1.71Z"/><path class="cls-1" d="m554.7,505.62h.48v.79c-.48.06-.33-.52-.48-.79Zm-44.91,54.12c.58,0,.85-.31,1.11-.63-.69-.11-.88.28-1.11.63Zm-119.99-84.6c.24.13.23.51.32.8-.82,2.05-1.22,2.75-1.43,5.55-.73-.72-.37,1.7-.48,2.38-.06.38-.39.75-.48,1.11-.44,1.88-.02,3.88-.95,4.92.72,1.43-.04,2.78.16,5.08.05.5-.46-.4-.48.16.25.22.41.55.48.95-.19,5,.89,9.18,1.27,13.65.27-.1-.01-.76.32-.79-.07,2.59,1.31,3.91.95,6.35.05.33.43-.24.48.32-.16,3.19.88,4.46,1.11,8.57.94.65.18,2.85,1.43,3.97.21,2.93,2.07,5.49,2.06,7.62.09-.23-.19-.82.16-.79.26.96.24,2.19,1.11,2.54.73,2.9,2.58,5.7,3.17,7.78,1.51,2.58,3.07,4.7,4.76,7.78.36.17.7.36.95.63,2.5,3.27,4.96,6.58,8.57,8.73,2.6,2.85,5.8,5.1,9.52,6.83-.17.65.55.41.63.79.53-.58.51.09,1.27,0-.32.36.52.27.63.95,1.92.63,3.37,1.67,5.24,2.06.67.14,1.16.91,1.59,1.11,1.39.67,3.08.39,4.29,1.59,9.6,2.71,19.31,3.89,31.11,2.38.25-.12.24-.5.63-.48,1.58.04,3.02-.04,3.97-.63,9.8-1.76,18.52-6.18,28.57-7.78.38-.22.1-.32.32-.48,2.98-.45,4.44-1.68,6.67-2.23.25-.6.6-1.09,1.27-1.27.82.61,2.69-.2,3.02-1.11,1.65-.04,2.61-.78,3.33-1.75,1.36.19,1.4-.93,2.22-1.27.99.42,1.47-.94,2.22-1.27,1.01-.08,2.25-.48,2.22-1.11-.13-.75-1.48.69-1.91.16,2-1.92,4.36-3.47,6.98-4.76,2.51-2.78,6.25-4.33,8.57-7.3,6.44-4.56,10.74-11.27,15.71-17.3.21-1.58,1-2.6,1.91-3.49,4.14-9.16,7.98-20.41,6.35-33.33.68-4.2-1.32-8.4-1.43-12.85-2.35-4.89-1.91-11.13-3.65-16.19.05-.37.25-.59.16-1.11-.22-.39-.45-.38-.63-.48-.58-7.3-4.12-13.02-6.98-18.57-2.39-2.11-3.44-5.55-6.35-7.14-.05-1.11-1.27-1.06-1.27-2.22-1.61-.88-2.93-2.04-3.97-3.49-2.34-1.05-4.03-2.74-6.67-3.49-.11-.42-.72-.34-.79-.79-6.43-2.65-12.59-5.36-20.79-5.87-2.82-.93-6.76-.61-10-1.43-.29.24-.49.57-1.11.48-.54.12-.2-.64-.79-.48-2.32.27-4.55.07-6.35,0-1.02-.04-2.04.41-3.02.32-2.49-.22-5.51-1.83-8.57-2.22-2.22-.29-4.12-.89-5.72-1.11-1.23-.17-2.19.26-3.17.16-.43-.04-.85-.41-1.27-.48-1.1-.16-2.48.12-3.97.16-3.1.08-5.95-1.03-8.57.48-2.15-.63-4.22.21-6.67.16-.4.24-.78.49-1.27.64h-3.33c-8.11,2.77-17.76,4.56-23.18,9.52-2.59.06-4.18,2.48-6.51,3.33-.51.65-.95,1.38-1.91,1.59-1.17,2.04-4.11,3.03-4.92,4.92-.78-.02-.7,1.06-1.43.63-.03.3.18.35.16.64-2.1,1.5-3.63,3.56-4.92,5.87-.32.09-.31.48-.63.16-1.61,2.83-2.86,6.03-4.76,8.57-.4,1.92-1.16,3.94-2.06,5.71-.32,2.45-1.37,5.5-1.9,8.25.18,2.12-.67,5.21-.79,8.1-.63-.63.04.85-.63.63,0-.17-.07-.4-.16-.16v.16Zm7.94-17.78c.12.67-.21,1.39-.16.32.97-2,1.24-4.8,3.02-6.35v-.95c3.78-6.8,9.28-11.88,14.44-17.3,2.56-.83,3.73-3.04,6.35-3.81.41-.17.68-.48.8-.95,3.32-.98,5.73-3.66,9.04-4.13.38-.15.65-.41.79-.79.54.29.76-.02,1.43,0,2.98-1.55,7.68-2.27,10.63-3.33,10.63-1.75,22.84-2.26,33.49-.32-.1.57-.76-.04-1.43.16.29.31.29.12.16.64-4.98,1.49-10.14.66-14.92.63-.23.48-.83-.05-.79.47-2.9.2-5.32.06-8.25.64-1.39.28-2.7.9-3.97,1.11-1.41.23-2.87-.21-3.81.79-1.63.06-2.98.4-3.97,1.11-2.28.18-3.9,1.23-5.87,1.59-1,.19-3.67,1.53-4.92,2.22-.08.05-.16.43-.32.48-1.23-.17-1.23.88-2.38.79-4.68,2.58-9.46,5.83-13.81,9.2-1.74,1.44-2.9,3.45-5.08,4.45-.2,1.54-1.93,1.56-2.06,3.17-1.57.9-2.42,2.34-3.33,3.81-.18.28-.95.59-1.11.8-.41.53-.43,1.33-.8,1.9-.73,1.15-2.17,1.98-2.38,3.65-.3.3-.4.02-.79,0Zm96.97-35.24c.03-.18.16-.09.16,0,4.95.13,10.1.52,14.92,1.27,5.6.87,12.15,3.39,16.66,5.24.17.07.75.37.63.79.6-.12.76.19,1.27.16,4.29,2.7,8.2,5.76,11.59,9.36.59,1.47,1.52,2.61,2.7,3.49.08.98.6,1.51,1.11,2.06-.25.23-.14.81-.16,1.27.14.47.24-.37.63-.16-.13.93,1.75,1.73,1.59,3.65,1.01,1.07,1.82,2.24,1.74,3.81,1.11.75,1.56,2.61,1.75,4.6-.17-.04-.11-.32-.32-.32-.03.27.27.41,0,.48-.05.31,1.07-.43.79.48-.27.06-.3-.13-.32-.32-.47.13.1.51,0,.79-.52-.43-.97-.94-1.11-1.75-.3-.3-.4-.02-.79,0,.08-.82-.74-.74-.63-1.59-6.79-8.29-15.5-14.66-25.71-19.52-.13-.4-.56-.5-.79-.79-.9,0-1.32-.48-1.74-.95-3.08-.57-4.62-2.69-7.78-3.17-.52-.7-1.65-.79-2.06-1.59-4.49-1.22-7.06-4.37-11.75-5.39-.69-.69-1.27-1.48-2.54-1.59,0-.15.19-.12.32-.16.03-.13-.06-.15-.16-.16Zm-10.48.64c1.22-1.06,4.26-.25,5.24.48,2.17.05,3.35,1.1,5.08,1.59-3.31-.44-7.35-1.45-10.32-2.06Zm-27.46,2.22c-.14.28-.56.29-.79.47.05.22.39.13.63.16-.69.79-2.68.59-2.54,1.75-1.57.01-3.05.12-3.97.79-9.77,2.41-19.25,6.46-26.66,11.74-2.48.58-3.81,2.73-6.03,3.97-.27.06-.3-.12-.32-.32-.53.15-.08.29-.16.79-3.58,2.77-7.18,5.52-9.84,9.21-.34.14-.47.49-.95.48-1.11,1.53-1.81,3.48-3.65,4.29,3.63-6.53,8.48-11.83,14.13-16.35,1.96-2.38,5.26-3.42,7.3-5.71.5.08.56-.29,1.11-.16,8.52-5.75,19.7-9.39,31.74-11.11Zm32.22,6.98c-1.22.11-3.55.57-5.08,0-1.85.65-5.67.18-8.73.32-2.67.12-4.79.84-6.67.32-4.12.85-7.82,1.08-11.74,2.06-3.67.92-7.66,2.2-11.11,3.33-1.67.98-3.48,1.71-5.24,1.9,1.86-.65,3.63-2.16,5.55-2.22,1.99-1.03,4.22-2.5,6.82-2.7,5.1-2.66,12.21-3.75,18.41-4.44,5.69-.64,12.69-.06,17.77,1.43Zm41.74,24.76c.15.4.82-.43.79.32-1.04-.17.69,1.13.16,1.43-.7-.03-1.91-1.82-2.86-2.86-2.19-2.41-4.87-4.9-6.82-7.3-1.87-1.41-3.33-3.23-5.08-4.76-.46.04-.49-.36-.95-.32-3.3-3.26-7.44-5.68-11.27-8.41-1.23-.41-2.49-.8-3.17-1.75-1.23-.2-1.91-.94-3.01-1.27.98-.28,1.9.45,2.86.64.35.07.23-.31.32-.32,1.07-.06,2.45.88,3.81,1.11,1.14.19,2.3,1.07,3.49,1.43.28.08.68-.11.95,0,.2.08.27.55.47.63.25.1.36-.23.64-.16.69.18,3.15,1.7,3.33,1.91.15.16.75.53.48.16,2.99,2.26,6.02,5.83,8.89,8.73.05.26-.15.27-.16.48,1.46.71,1.74,2.6,3.17,3.33.07.33-.11.42-.16.64,1.81.72,1.99,3.78,3.49,4.28-.12.95,1.32,1.56.63,2.06Zm-128.56,40c.47,1.61.27-.91.48-2.38.35-2.5,1.5-5.15,2.06-7.3.83-3.19,1.68-6.25,3.18-9.05.49-.9,1.15-1.62,1.59-2.54,1.2-2.53,2.64-5.57,4.6-7.3,2.22-3.76,4.74-7.22,8.1-9.84.5-1.4,1.93-1.88,2.54-3.17.46-.28.98-.5,1.43-.8.74-1.38,2.39-1.85,3.18-3.17,7.01-5.1,15.02-10.05,24.12-12.54.45-.03.44-.52.79-.63,2.49.37,3.07-1.16,5.4-.95,3.6-1.38,8.74-1.2,12.69-2.22,7.3.39,16.09-.68,23.81-.16,3.42.23,6.26,2.61,9.05,4.44,1.05.69,2.54,1.23,3.17,2.38h.79c3.55,3.48,7.59,6.49,10.95,10.16.13.18.21.42.16.79.93.36,2.48,1.42,2.86,2.86,2.22.94,3.4,3.9,5.39,5.55v.79c.14.47.24-.37.64-.16.13.18.21.42.16.79,1.81,1.05,2.25,3.46,3.97,4.6,0,1.32,1.92,2.91,2.86,4.29-.22.45.43.8,0,.95.82.73,2.39,2.31,2.06,4.13.03.29.54.1.64.32.47,2.22.36,4.45.63,6.99.15,1.38.25,2.14.16,3.65-.08,1.36.21,2.94.16,4.61-.06,1.88-.6,3.19-.16,4.76-.15-.12-.24-.29-.32-.48-.39.15.22.61,0,1.11-.17-.04-.11-.32-.32-.32.53.69-.29,3.96-.64,3.33.09.33-.2,1.04.16,1.11-1.08,2.12-2.18,5.37-3.17,8.09-.13-.03-.16-.16-.32-.16-.51,2.64-2.52,4.84-3.65,6.66-.24.39-.56,2-1.75,2.06.44.56-.44.86-.32,1.59-1.55,1.42-2.82,3.11-3.97,4.92-1.73,1.34-2.91,3.23-4.76,4.44v.63c-5.06,4.27-9.34,7.74-14.76,12.06-.36.12-.81.14-1.11.31-.52.59-1.21,1.01-2.06,1.27-2.14,2.62-6.08,3.44-8.41,5.87-1.36.55-2.79,1.04-4.13,1.75-2.91,1.52-6.91,3.41-10.47,4.76-1.83.69-3.88,1.8-6.67,1.43-8.34-1.12-16.67-4.54-24.28-6.82-2.55-2.32-6.93-2.8-9.36-5.24-1.91-.32-2.65-1.8-4.6-2.07-6.34-4.19-12.29-8.76-18.09-13.49-.13-.19-.21-.42-.16-.79-2.77-1.15-3.56-4.27-6.19-5.55-.13-.18-.21-.42-.16-.79-2.29-2.28-3.99-5.75-6.03-7.78.28-1.34-1.07-2.17-1.43-3.33-.94-3.08-.17-6.61-.79-9.21-.14-.51.41-.33.48-.63-.59-1.42-.02-2.61-.16-4.6Zm25.55-55.23c-.36-.12.35-.48.32-.8.66.18.62-.33,1.11-.32-.61.88-.5.71-1.43,1.11Zm12.06-.95c-.16.58-.95.53-1.43.79-.06-.17.71-.87,1.43-.79Zm85.87,2.38c1.05.84,1.25,1.1,2.22,1.59-.12.28-.29.02-.48,0,.08.23.24.4.32.63.28-.04.8.16.64-.32.33.09.34.25.16.48,1.39.54,3.02,2.15,3.81,3.81.25-.1,1.64.57.79.95.36.17.56.5,1.11.48.06.27-.12.3-.32.32.14.46.24.18.63.16-.09.41.06.57.48.48.52,1.84,2.39,3.33,2.86,5.71-.52-.92-.27.41.31.16.14,1.25,1.41,1.46.95,3.02.05.21.4.13.63.16.08,2.14.65,2.75.79,4.13.07.24.2-.06.48,0,.07.34-.23.3-.48.32.27.2.43.52.48.95-.26.04-.27-.15-.48-.16.09.13.17.26.16.48.05.22.4.13.63.16v1.11c-.24-.13-.34-.4-.32-.79-.18,1.43.7,1.45.79,3.17-.31-.32-.17-1.1-.64-1.27-.34.14.3.64.16,1.11-1.43-4.22-3.39-7.67-5.56-11.59-.61-1.1-.86-2.45-1.59-3.33-.4-.49-1.02-.87-1.43-1.59-.38-.66-.36-1.33-.79-1.9-.5-.67-.98-1.22-1.43-1.91-.71-1.08-1.47-2.39-2.38-3.33-.63-.65-1.2-1.36-2.06-2.06v-.64c.06-.38-.73.09-.48-.48Zm-102.69,1.59c-.62.34-.87,1.03-1.59,1.27.12-.14.17-.36.16-.63.14-.03.15.06.16.16.63-.75.42-.53,1.27-.79Zm-2.38,1.9c-.47.54-1.27.74-1.59,1.43-.56-.02.34-.53-.16-.48.81-.09.66-1.14,1.75-.95Zm-6.35,5.08c0,.85-1.74,1.7-2.38,2.38.45-1.14,1.59-1.59,2.38-2.38Zm-3.01,3.33c.47-.95-.32.61-.63.79-.42-.18.21-.62.32-.79h.32Zm-1.11.95c.38.26-1.26,1.14-1.43,1.9-.34-.61.92-.98.95-1.75.22.01.45.02.48-.16Zm-7.78,2.7c-.15,1.07-1.3,2.51-2.07,3.49.32-1.1,1.26-2.4,2.07-3.49Zm143,7.14c-.44-.54.74.56-.16.48.9.48,1.18,1.56,1.75,2.38.2.51-.51.12-.32.64,1.01-.43.61,1.99,1.43,2.22.08.5-.43.42-.48.79h.79c.23,2.82,2.58,7.44,2.06,10.64-.06.53.67.28.63.79.03.67-.24,0-.48,0,.59,2.54,1.39,4.55.79,6.98.12.53.18.99.48.95v.63c-.32-.53-.34-.13-.32.48.16,0,.12-.19.16-.32-.17,1.65-.03,4.17-.79,5.87-.48-.2.17-.55,0-.95-.08-.24-.16,0-.16.16-.51-.14-.54-.64-.32-1.11-1.01-3.65-1.9-7.4-3.17-10.79-.02-.19-.29-.13-.48-.16-1.78-5.12-1.15-9.96-1.27-16.19-.04-.6-.5-.77-.63-1.27.29-.7,0-2.14.47-2.22Zm-141.89,6.99c.2.44.33-.5.79-.32-.5,1.46-1.54,2.47-2.06,3.81-.17.43.09,1.14-.16,1.58-.03.06-.45-.06-.47,0-.41.93-.37,2.21-.8,3.33-.02.05-.23-.23-.16-.32-.41.47.04.4,0,.79-.03.33-.37.58-.48.95-.23.81-.2,1.94-.48,2.85,0,.01-.3-.2-.32-.16-.12.39.06.86,0,1.27-.54,3.49-1.89,7.46-1.59,11.43-1.6-1.73-.98-5.26-.32-7.3-.87-.25.52-3.56.95-5.72.05-.25-.19-.58-.16-.79.02-.13.45-.33.48-.47.12-.63-.12-1.26,0-1.75.21-.88,1.36-1.29.79-2.22,1.9-2.68,2.73-6.45,5.08-8.25-.43.36-.72.87-1.11,1.27Zm143.95,33.96c.5-.84.26.73.32,1.27-.22-.05-.13-.4-.16-.63-.08,1.86-.96,2.69-1.59,4.13-.74,1.71-1.11,3.74-2.38,4.29-.68,3.4-3.67,5.85-4.92,9.2-.7-.13-.55,1.12-1.11.64-1.51,3.41-4.03,5.81-6.03,8.73-.61-.25.54-1.85.95-1.59.09-.51-.3-.49,0-.8.15,0,.13.2.16.32.28-.14.35-.5.32-.95.46-.08,1.29-.6.95-.95.42-.05.36-.59.79-.64.11-.59.08-.41.16-1.11.77-.34.57-1.65,1.43-1.91.25-.78.45-2.36,1.11-2.22-.38-.17.34-.73-.16-.95.19-.52.42,0,.64-.48v-1.27c4.45-7.82,4.37-20.17,6.51-30.32.26-.04.27.15.48.16v-1.43c.47.43.45.73.16,1.27.04.2.31.16.32,0,1.11,3.08,1.3,7.41,1.75,10.95.08.61.54.97.48,1.43-.12.92-.03,1.24-.16,2.86Zm7.78-3.02c-.49-.97.31-3.57.32-5.24.76,2.17-.01,5.7-.16,8.73-.3-.02-.11-.53-.48-.48.05.37.34.8-.16.48.07.4.23.73.48.95-.94,1.31-1.05,4.89-1.75,6.83-.13-.03-.16-.16-.32-.16-.11,1.91-.88,4.47-2.22,6.03.51,1.14-.65,1.33-.48,1.9-.62.1.08-.6-.16-1.11.25-.04.27.15.48.16-.16-.63-.27-1.21.32-1.43.05-.28-.15-.32-.16-.16.35-5.4,3.04-10.27,3.97-16.66.13.03.16.16.32.16Zm-159.19,15.39c.1.21.34.3.64.32-.11,1.62.19.58-.64.31-.42-2.26-2.18-3.61-1.9-5.71-.3-.28-.38-.79-.63-1.11.56-.39-.33-1.39,0-2.86.09-.45.4,1.56.32.79.87,1.13.97,4.67,1.9,5.24.02,1.45.49,2.19.32,3.01Zm140.62-3.65c.26.87-1.27,2.63-1.27,4.29-1.24,1.62-1.79,3.92-2.7,5.88-1.89,1.79-2.25,4.24-4.28,5.71-.53,1.37-1.26,2.55-2.54,3.18.06,1.17-1.34,1.18-1.11,2.06-8.52,7.88-17.26,15.54-28.89,20.32-4.04.39-7.78,1.1-12.06.95,1.83-1.29,4.6-1.65,6.19-3.18,2.69-.7,4.76-2.01,6.67-3.49,5.91-2.56,10.27-6.65,15.55-9.84,9.45-7.51,18.01-15.72,24.44-25.87Zm-70.31,43.65c.1.62-.6-.08-1.11.16.29.52.58.13,1.27.32-7.95,2.45-19.95,2.25-27.78-.48-1.88-.66-3.82-1.61-5.71-2.54-1.97-.97-3.95-1.75-5.55-2.86-1.03-.71-1.84-1.87-2.86-2.7-2.74-2.23-5.44-4.19-6.98-6.98-1.48-.85-2.4-2.48-3.33-4.13-.48-.85-1.33-1.44-1.9-2.22-.91-1.23-1.48-2.76-2.22-4.13-.93-1.7-1.98-3.38-2.38-5.4-.31-.16-.36-.59-.63-.79.02-1.72-1.65-2.68-1.59-4.92,10.73,13.03,25.19,22.75,41.9,30.31-.2.6,1.26.45,2.06.79.51.22.91.88,1.43,1.11.6.26,2.37.75,3.02.95,1.57.49,3.62.75,5.4,1.43.8.3,1.57.99,2.06,1.11.41.1.86-.21,1.27-.16,1.24.16,2.36,1.35,3.65,1.11Zm-69.83-29.68c.73.75,1.55,1.79,2.06,3.17,2.73,3.66,5.37,7.92,9.05,11.27v.63c3.7,4.47,8.08,8.43,12.54,12.38,1.06.94,2.27,1.6,3.65,2.54,2.02,1.38,4.43,3.52,6.67,4.92.75.47,1.76.5,2.54.95.26.15.38.63.63.79.37.23.87.12,1.27.32.22.11.27.51.48.64,1.21.72,2.71,1,3.97,1.59.93.44,1.55,1.15,2.54,1.43,2.29.65,5,1.75,7.94,2.38,1.04.22,2.87.51,3.65.95.04.02-.38.22-.32.32,2.97.69,7.56.3,10.32,1.43.43-.02.14-.6.79-.16-1.16.67-2.86.85-4.28.95-8.17.59-14.85-.84-21.11-2.7-2-.59-3.6-1.28-5.87-2.06-1.51-.52-2.47-1.74-4.44-1.9-2.17-1.43-4.28-2.91-6.83-3.97-1.99-1.83-4.24-3.38-6.51-4.92-2.19-2.42-4.85-4.36-6.66-7.14-.26-.27-.59-.47-.95-.63-1.39-2.85-3.91-4.56-4.76-7.93-.48-.53-1.05-.96-.95-2.07-1-1.28-1.43-3.12-2.54-4.28-.09-2.2-1.41-3.02-1.27-4.92-1.12-.59-.56-2.76-1.59-3.97Zm145.54,2.7c.4.25-.11.94-.47.95,0-.48.34-.62.47-.95Zm-.79.79c.21,2.38-2.28,3.43-2.86,5.56-4.08,4.23-7.85,8.76-13.01,11.9-.72.6-1.25,1.4-2.22,1.75-.99,1.34-2.98,1.68-3.97,3.01-1.16.38-2.21.86-2.86,1.75-1.45.16-2.34,1.66-3.49,1.59-.92.88-2.15,1.45-3.49,1.9-.18-.19.63-.74.63-1.27,1.54-.26,2.35-1.24,3.17-2.22,2.45-1.63,4.74-3.41,6.51-5.72,2.12-1.05,3.96-2.38,5.56-3.97.26-.05.27.15.48.16.09-.39.61-.34.48-.95,4.56-2.69,8.38-6.12,11.75-10,.67-.8,1.97-.99,2.22-2.22.53.26.87-.45,1.11-1.27Zm-19.68,11.59c-.5,1.67-2.78,2.93-4.44,3.97,1.63-1.18,2.82-2.78,4.44-3.97Zm-14.44,12.86c-1.17,1.21-2.54,2.22-4.13,3.01-.35.23-.64.52-.79.95-5.81,2.72-9.56,6.98-16.99,7.78-3.69,1.18-9.95.94-13.65.47-1.42-.02-2.4.04-3.33.16,3.51-.9,7.08-1.51,11.27-2.22,9.82-2.77,17.18-8,27.61-10.16Zm-21.11,4.13c-1.41.81-2.98,1.46-4.92,1.75.46.38-1.7.73-3.17.95-1.96.3-4.25,1.24-6.51,1.59-6.71,1.04-14.04.35-20-.95,7.44-.28,14.16-1.09,20.79-3.01,2.38-.7,4.51-1.03,7.3-.8,2.14.18,4.22.24,6.51.48Z"/><path class="cls-1" d="m128.03,472.84c-2.46.97-5.75,2.13-8.46,1.29,2.72-.64,5.53-1.09,8.46-1.29Zm-16.65.49c.42-.75,1.3-.51,1.69-1.32-.9-.52-2.09.33-1.69,1.32Zm-46.2-6.86c1.09-.34,2.55.14,3.13-1.29-1.28-.07-2.51-.05-3.13,1.29Zm-11.63-1.32c.74.46.93-.3,1.38-.46-.55-.05-1.1-.08-1.38.46Zm5.11,2.59c.27.17.3.45.78.52.12-.38.29-.65.53-.78-.53-.11-1-.12-1.31.26Zm-3.34,1.2c.76.36,1.22.07,1.6-.39-.7-.24-1.25-.15-1.6.39Zm-5,1.09c.59-.27,1.44.03,1.75-.82-.85-.3-1.43-.02-1.75.82Zm120.26,101.63c1.2.67,1.54-.5,2.67,0,.2-1.48-2.05-.35-2.67,0Zm-8.91,1.85c.88-.14,1.47-.92,2.33-1.09-1.14-.86-2.35-.03-2.33,1.09Zm-23.88-.93c.54.27.95.26,1.09-.33-.54-.27-.95-.26-1.09.33Zm-8.54-1.17c.01.79-.75-.09-.74.7,1.15.61,3.03-.31,5.02.85.29-.4.7-.52,1.03-.83-1.16-1.63-3.14.64-5.31-.72Zm5.35,1.95c-.4.72.4.88,1.05,1.11.04-.67.5-.45.6-.99-.88.11-.88-.11-1.65-.12Zm-17.78-5.73c.45.28,2.32.79,3.02.37-1.18-.49-2.26-.77-3.02-.37Zm14.82,5.87c.66.49,1.8.1,1.38-.47-.27.57-1.24-.36-1.38.47Zm-5.25-.21c1.63.84,2.41-.17,3.95.46-.16-1.77-2.81-.27-3.95-.46Zm-11.03-2.32c1.79.43,2.84,1.35,4.03.25-1.03-.85-3.07-.82-4.03-.25Zm-33.55-5.66c.68.19,1.05-.3,1.59-.39-.36-.8-2.11-.69-1.59.39Zm96.32,4.26c.47.37.63.89,1.26,1.19,3.02-.88,6.3-1.23,9.41-1.91.19-.5-.14-.76.25-1.36.52.11,1.04-.1,1.28.47.39-1.45,2.42-1.4,3.05-1.07-.73.21-1.61.1-2.04.95,1.39,1.26,2.73-.69,4.53.2.57-.39.16-1.38,1.19-1.27,3.9.37,6.53-2,10.08-2.39.35-1.67,1.36-1.91,2.84-1.15,1.78-1.65,4.6-1.07,5.93-3.66.52.11.92-.05,1.57.33,5.21-2.91,10.72-5.2,15.58-8.87-.85-.22-.94,0-.91-.82.41-.26.75-.68,1.38-.47.33.14-.03.61.49.66,6.11-4.24,11.17-9.12,13.99-16.47,1.4-3.66.81-7.48,1.54-11.55.65-3.64-.73-7.22,0-10.66-2.08-9.09-8.63-16.1-15.08-23.16-3.35-2.17-5.46-4.92-8.52-7.22.31-2.46.71-4.95.7-7.25-3.47-4.19-11.93-7.85-18.56-8.93-.88-.06-.42-.76-1.13-.89-10.23-3.33-19.32-4.61-28.57-6.03-.57-.09-1.24-.27-1.79-.41-5.99-1.55-12.35-3.5-18.95-5.19-.52.02-.87.42-1.52.18-5.05-1.4-10.68-3.8-15.33-3.15-6.14-2.73-12.96-2.52-18.58-2.88-10.66-.67-21.24-1.3-31.24-.7-.13.24-.19.62-.45.57-20.06,1.29-38.23,6.64-54.52,16.03-.44,1.57,1.1,2.21-.04,4.1,1.42,1.02,1.49-.87,2.74-.21-.4.78-.44,1.39-.19,1.87,3.46.57,5.3-2.35,8.56-2.22.42,0,.35-1.02.82-.91.71.14.25.83,1.13.9.25-.74.48-1.52,1.05-1.56,2.12.99,2.81-1.09,4.49-1.03,1.03,0,.92,1.45,1.85.92-.16-1.63,2.76-2.68,3.56-1.13,1.88-.66,3.64-1.6,6.01-1.21.75-.76.29-1.73,1.21-1.98.72.08,0,.83.91.82,1.14-.72,2.93-.07,3.85-1.27,1.49.91,1.93-.44,3.17-.06.79.1-.04.97.84,1.03.9.16,1.2-.98,2.18-.66-.36,2.2-3.72,1.12-4.9,2.82-2.25.5-5.09-.25-6.67,1.69.99.35,1.22-.94,2.31-.37,1.27,2.77,4.4-1.48,6.4.39.29-.51.66-.87,1.11-1.05,4.51.27,8.33-.93,12.29-1.83l1.07.39c1.46-.68,3.55,0,4.92-.88,3.34.89,6.85-.3,10,.49.94-1.02,2.57-.58,4.05-.47-20.07,4.45-38.21,13.03-54.01,26.63-8.07,8.51-15.07,25.15-11.92,36.12-.47,7.39,3.26,12.81,5.47,18.94,2.74,1.88,4.33,5.62,7.2,8.19.47.42,1.21.41,1.63.84.65.66.82,1.68,1.6,2.27,1.07.83,2.45,1.54,3.68,2.55,1.52,1.26,3.83,1.61,5.62,2.53,3.2,1.63,6.56,2.83,8.91,3.48.53,0,.64-.9,1.24-.76.48.48.12,1.37.82,1.75,1.35.86,1.48-.9,2.61-.51.62.75,2.3,1.01,3.21,1.17-.27.18-.49.47-.6.99.85.29.72-1.51,1.61-1.11.22.75,1.65,1.2,1.91,1.42-1.09-.31-1.88.03-2.61.5,4.62,1.08,8.16,1.99,11.94,3.13.75-.12.06-1.23.68-1.2.42.1.38.41.78.52-.24.37-.75.17-.82.91,2.24.92,5.14,1.21,8.38,1.6.42.15.06.68.7.74,1.89-.77,5.5,1.21,7.7.14.67.65,2.6,1.12,3.09.16-2.11-.94-5.52-.1-7.59-1.79,1.71.38,3.26.57,4.51.92.4-.54-.1-.67.18-1.15-1.43-.26-2.71-.23-3.89.04-2.41-1.4-5.91-1.21-8.95-2.04-1.64-.45-3.71-.79-4.44-1.13-1.5-.7-1.79-1.83-2.61-2.16,1.89.75,2.54.43,4.1.04,3.06,1.35,5.91,1.14,9.32,1.7.32-1.09.91-1.6,2.04-.95.08.75-1.22,1.03-.25,1.36,1.28-.49,3.03-2.34,3.97-.25,1.43-1.89,4.99.81,6.57-.76,2.48.47,4.83,1.41,6.59,1.19.57.39,0,1.31.89,1.54,1.35.36,2.26-.23,3.74.39.32-.75-.85-.79-.39-1.6,1.65-.02,3.07-.54,5.04.14-.34.55-.86.7-1.19,1.27,3.94.33,7.76.39,11.24-.27-.02-1.8,1.98-1.25,3.34-1.21,1.23,2.73,3.89.43,5.6.58.68-.72.59-.74,1.13-1.77.92,1.07,2.24.07,3.03-.35,2.75.64,3.89.03,6.48.17-.49.61-1.2.97-1.81.31-.14.71-.77.67-.47,1.28.94-.35,1.21-1.14,2.45-.08.71-.35-.28-.92.12-1.65,1.33.17,1.89,0,3.25-.27.76.39.78.58,1.48,1.27.69-.33,1.61-.76,1.83-1.03,4.02,2.41,5.33-1.03,7.9-1.73.59.14-.13.89.62.95,1.2-.47,2.71-.28,3.64-1.34,1.44.79,2.2-.1,3.29.95,1.98-2.01,3.43-.57,5.74-1.79.3-.62.37-1.75,1.05-1.55,3.25,1.91,5.6-1.11,8.73-.7.24-.63-.01-1.94.92-1.85.78,1.37,1.45.1,2.59.21.13.41.05.63-.31.86,1.48-.11,2.8-.59,3.25-2.94,1.52.36,2.95-.3,3.06,1.59-1.39.45-2.34,1.84-4.28,1.11-2.06,1.95-4.7,2.62-7.02,3.99-.65-.81-1.97-.3-2.39.58.38.14,1.46-.12,1.5.55-.81.18-1.56.47-2.39.59-.99-.37.23-.95-.55-1.17-3.36,1.44-7.53,1.11-10.74,2.88-.52.26-.48-.37-1.28-.47-1.55,1.2-4.18,1.85-6.01,1.21-1.38,2.11-5.51.38-6.4,2.28.04-.8.79-.09,1.22-.04.09.63-.95.66-.39,1.07,1.25-.5,3.15.39,3.99-.97-.56-.52-1.42.2-1.5-.54.36,0,.65-.12,1.01-.11Zm17.49-92.72c1.21.27,1.67.88,2.41,1.36-.2.46-.94-.24-1.36-.25-.34,1.53,1.59.43,1.98,1.21-1.59,1.69-4.86-1.36-7-2.06,1.09-.25,2.82.29,3.8.89.35-.63-.53-.83.17-1.15Zm-84.45-6.24c.48.25.79.58,1.13.89.55.18.69-.56.9-1.13.29.46.77.83.39,1.6,1.64.22,3.33.53,4.47-.31,1.01.4.11.59-.04,1.44-1.21-.34-2.95-.14-4.12.68,1.82.69,4.32-.36,6.15-.92.18-.76-1.29-.1-.99-.6,1.17-1.04,3.16-.34,4.08-1.91.92.4.27,1.53.37,2.32,1.38.29,2.16-.7,3.54-.41.39-.6.07-.86.25-1.36-.04.66,1.08,1,1.5.54.18-.77-1.29-.1-.99-.6.11-1.02.98-.44,1.19-1.27-.45-.69-1.52.54-2.45.08,1.55-.67,4.31-2.18,6.05.02.75.2,1.35.1,2.22.56-.73.46-1.92-.05-2.47.8.05,1.49,1.32-.47,1.58.33-1.31,1.38-3.83.17-5.16,1.52,1.5.8,4.05.55,5.27-.51,8.74.21,16.53-1.58,26.08-.45,3.94-.09,8.16-.02,12.8.78,4.3.73,9.75,1.32,13.24,2.88,3.28,1.45,6.16,4.23,10.12,4.16.99,1.89,3.68,2.41,6.32,3.27.71.14.36.78.84,1.03,9.96,5.08,20.09,10.57,27.25,17.66.68.44.94-.02,1.58.33.12.36-.07.87.04,1.22,5.65,5.66,11.06,11.42,13.33,18.65-4.31,10.06-11.77,13.35-18.63,17.93-9.27,4.12-18.06,9.26-28.32,11.26-.48.36-1.17.28-1.54.89-5.66.7-10.6,2.93-16.3,3.52-.54,0-.81.55-1.25.76-4.72-.09-8.55,1.72-13.36,1.44-5.3,1.2-11.42.66-16.82,1.63l-1.07-.39c-1.6.12-2.84,1.01-4.9.15-3.1.42-5.41.37-8.71-.02-7.85.11-15.02-.29-23.65-1.58-3.27-.97-7.84-1.81-12.31-2.78-4.42-.95-9.07-1.58-12.95-3.01-5.65-2.09-12.65-4.91-20.66-8.48-6.35-2.84-11.3-7.62-14.86-12.43-1.58-2.13-4.26-5.54-4.18-7.82.06-1.82,1.73-3.03,1.07-4.94,4.28-9.56,10.79-17.43,18.09-21.77.26-1.47,1.18-1.53,1.65-2.55.31-.09.68-.07,1.15.17,2.04-2.48,5.16-2.65,7.33-4.84,1.56-.08,2.46-1.58,3.87-1.98.28-.54-1.27-.23-.62-.95.64.32,1.2-.12,1.5.54,3.44-1.26,6.31-3.73,10.05-4.34l.31-.86c2.37.64,3.54-1.31,5.72-1.07.13-.35.26-.71.39-1.07-.32-.53-1.44.45-2.24.16,1.09-.59,1.99-1.58,3.29-1.71,1.12.19.17,1.34,1.4,1.48,1.11-.54-.88-.63-.47-1.38.87-.38.56.78,1.63.84,3.56-.51,6.54-2.24,10.56-1.73.27-.18.49-.47.6-.99,2.82-.04,5.56-.27,7.68-1.81-2.16-1.05-4.14,1.5-6.79.68.13-.36.26-.71.39-1.07-1.13-.04-3.4,1.07-3.66-.6.41-.52.64.7,1.01-.12-.03-.75-.93.02-.99-.6-.56-.05-.45,1.33-.97,1.34.56,1.7,2.6.78,4.01.97-2.3,1.25-4.01,1.52-6.67,1.69-.25-.55.27-.34.39-1.07-1.33-.2-1.53.17-1.48,1.4-.88.14-1.68.47-2.74.22.57-.69,1.63-.31,2.39-.58.19-.33-.07-.44.02-.72-1.19.12-2.51-.04-3.13,1.28-1.12-1.16-1.87.82-3.38-.02.52-1.55,2.22-.56,2.59-2.45.71.14.62.66,1.42.76.56-.33,1.16-.57,1.61-1.11-.85-.3-1.16.57-2.02.23,1.35-1.17,3.35-.94,4.67-2.18,1.16.17,1.41.76,1.4,1.48.86-.47-.3-1.51.43-2.51.63,2.02,2.64.8,3.62-.62Zm7.86-13.62c.05.69.23,1.32-.06,2.16-1.4-.46-2.22.32-3.73-.39,1.13-.26,2.15-.52,3.17-.06.43-.62-.09-.79-.04-1.23-.6-.4-.63.44-1.23.04.23-.4.2-.68-.19-.8.65-.55,1.38-.09,2.08.27Zm-18.73.21c-.31.98-.61,2-1.56,1.61-.37-.63,1.03-.61.54-1.5-.5.33-1.33-.06-1.81.31-.34.63.21.85.83,1.03-.99.81-2.49.51-3.97.25.55-.72,1.72-.12,2.26-.88-.42-.46-1.16-.75-1.79-.41-.35-.65.9-1.08,1.13-1.77,1.45,1.28,3.04.64,4.36,1.35Zm-7.68,1.81c-.67.35-1.39.58-2.31.37.29-1.16,1.35-.65,2.31-.37Zm-15.7-.14c.77.51-.27,1.35-1.03.84.32-.34.59-.76,1.03-.84Zm16.11,19.67c.65.23.67.75,1.05,1.1-.88,1.04-2.32.87-3.42,1.42.22-.56,2.02-.99,2.37-2.53Zm-17.47,6.73c1.03.52-.43,1.04-.54,1.5.36.66,1.18,0,1.87.19-.55,2.51-3.1.72-3.75,2.99-.64.02-1.36-.13-1.81.31-.09-1.22,1.77-1.52,2.51-2.24.09-.51-1.13-.42-1.13-.89.21-.57.36-1.25.76-1.42.72.82,1.59.27,2.1-.45Zm154.51,62.73c1.57.64-.52,2.39-1.36,2.41.6-.51,1.07-1.26,1.36-2.41Zm-161.01-56.85c.07.54-1.12,1.64-1.98,1.46.58-.66,1.37-.88,1.98-1.46Zm-2.57,1.73c.82-.42-1.13,1.8-1.99,1.46-2.53,3.09-5.96,4.23-8.21,7.91-1-1.52,2.73-2.35,1.19-3.93.33-.69.71-1.27,1.26-1.48.95.33-.66.98.17,1.52,1.05-.54,2.09-1.1,2.67-2.66-.12-.72-1.18.88-1.44-.04.32-1.84,1.63-1.59,2.37-2.53.88.24,1.58.56,1.77,1.13.84-.23,1.34-1.2,2.2-1.38Zm38.96,72.06c-.53.27-1.15.34-1.67.6-.25-.3-.56-.57-.33-1.09.71.25,1.2.03,2,.48Zm-34.82-9.51c2.11,1.13,5.48,3.02,7.7,2.8.03.57.49.96,1.26,1.19-1.29.29-2.64.44-4.18.18-1.01-.6-.62-1.84-2.1-2.22-.41.15-.62.7-1.03.84-.62-.62-1.82-.45-2.41-1.36.25-.48.63-.68.76-1.42Zm39.06,15.17c-.83.39-2.03-.03-3.09-.15.73-.59,2.13.26,3.09.15Zm-3.81-.17c-.87-.35-1.47-.11-2.43-.64.53-.06,2.51-.48,2.43.64Zm-4.73-.99c1.57-.61,2.23.8,0,0h0Zm-1.85-.92l1.07.39c.09.78-1.64.15-1.07-.39Zm-2.51-.43c-.07.22-2.74-.19-3.15-.66.93-.04,2.02.26,3.15.66Zm-3.66-.6c-1.39-.61-3.26-.5-4.28-1.56,1.14.33,3.94.44,4.28,1.56Zm-30.75-101.3c.08-.33.36-.76.1-.93-.43.73-.92,1.32-.49,2,.95-.12,1.89-.26,2.69-.72.17-.67-.38-1,.19-1.87.18.01.42.15.51-.06l-.86-.31c-.03,1.42-.37,2.57-2.14,1.88Zm-9.43,2.63c1.07.74-.92.56-.97,1.34.66.79,2.68-.5,2.63-1.22-.57,1.46-.94-.71-1.65-.12Zm117.15,102.19c-.26.73-1.84.6-2.02.23.22-.55,1,.11,1.03-.84-1.97.4-5-.7-6.73,1.18,1.66.13,2.76-.95,4.69-.23-.37.73-1.41.02-1.75.81,1.48.71,3.8.06,5.14-.79-.07-.38.13-.89-.62-.96-.07.27-.12.53.27.59Zm-8.48,2c-2.04-1.73-5.94.92-8.48-.66,1.36-.15,2.97.01,4.4-.1,1.26-.1,3.11-.16,3.85-1.27-7.04,1.15-15.13.07-22.08,1.42,1.46.92,4.32-.34,5.82.66-.63-.08-1.16.06-1.6.39.98.73,1.8.36,2.94.58.52-.72-.2-.85-.25-1.3.49.04.8-.31,1.44.04-.11.27-.38.19-.44.56,1.2.41,2.08.14,3.23.45.52-.71-.68-.63-.25-1.3.27.23,1.2.15.99.6-.27-.07-.53-.12-.59.27,3.88.32,7.37-.19,11.03-.35Zm-41.37-1.48c1.26.54,2.97.04,3.79.9-1.74.45-4.39-1.05-5.83.06,2.09.79,4.63,1.02,7.39.99-.33-1.02.93-1.81,0-2.66-1.2,1.49-3.93-.29-5.35.72Z"/></svg>');
        });
    }

    public function registerPermissions()
    {
        Permission::register('view alt-sitemap')
            ->label('View Alt Sitemap Settings');
    }

    public function registerEvents()
    {
        Event::subscribe(Sitemap::class);
    }

    public function bootAddon()
    {
        $this->addToNav();
        $this->registerPermissions();
        $this->registerEvents();
    }
}