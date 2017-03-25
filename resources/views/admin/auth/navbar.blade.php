<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 25.03.2017
 * Time: 16:06
 */
?>
@if ($user)
	<li>
		<a href="/" target="_blank">
			<i class="fa fa-btn fa-globe"></i> @lang('sleeping_owl::lang.links.index_page')
		</a>
	</li>
	<li class="dropdown user user-menu" style="margin-right: 20px;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			<img src="https://avatarko.ru/img/kartinka/3/film_2609.jpg" class="user-image" />
			<span class="hidden-xs">{{ $user->name }}</span>
		</a>
		<ul class="dropdown-menu">
			<!-- User image -->
			<li class="user-header">
				<img src="https://avatarko.ru/img/kartinka/3/film_2609.jpg" class="img-circle" />

				<p>
					{{ $user->name }}
					<small>@lang('sleeping_owl::lang.auth.since', ['date' => $user->created_at->format('d.m.Y')])</small>
				</p>
			</li>
			<!-- Menu Footer-->
			<li class="user-footer">
				<a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>
		</ul>
	</li>
@endif