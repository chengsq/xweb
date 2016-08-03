<?php
function corporate_prime_title_trail() {
	?>
	<!-- Breadcum Start -->
	<div class="container-fluid c_space c_breadcum ">
		<div class="container">
			<div class="row c_breadcum_heading">
				<?php corporate_prime_breadcrumbs_title();?>
				<?php corporate_prime_breadcrumbs();?>
			</div>
		</div>
	</div>
	<!-- Breadcum End -->
<?php
}

function corporate_prime_breadcrumbs_title($before = '<h1 class="pagetitle white animate" data-anim-type="fadeInLeft">', $after = '</h1>') {
	if (is_archive()) {

		if (is_category()) {
			$title = sprintf(__('Category Archives: %s', 'corporate-prime'), '<span>' . single_cat_title('', false) . '</span>');
		} elseif (is_tag()) {
			$title = sprintf(__('Tag Archives: %s', 'corporate-prime'), '<span>' . single_tag_title('', false) . '</span>');
		} elseif (is_author()) {
			$title = sprintf(__('Author Archives: %s', 'corporate-prime'), '<a href="' . esc_url(get_author_posts_url(get_the_author_meta("ID"))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a>');
		} elseif (is_year()) {
			$title = sprintf(__('Yearly Archives: %s', 'corporate-prime'), get_the_date(_x('Y', 'yearly archives date format', 'corporate-prime')));
		} elseif (is_month()) {
			$title = sprintf(__('Monthly Archives: %s', 'corporate-prime'), get_the_date(_x('F Y', 'monthly archives date format', 'corporate-prime')));
		} elseif (is_day()) {
			$title = sprintf(__('Daily Archives: %s', 'corporate-prime'), get_the_date(_x('F j, Y', 'daily archives date format', 'corporate-prime')));
		} elseif (is_post_type_archive()) {
			$title = sprintf(__('Archives: %s', 'corporate-prime'), post_type_archive_title('', false));
		}
	} elseif (is_search()) {
		$title = sprintf(__('Search Results for : %s', 'corporate-prime'), get_search_query());
	} elseif (is_404()) {
		$title = sprintf(__('Error 404  : Page Not Found', 'corporate-prime'));
	} elseif (is_home() || is_front_page()) {
		$title = sprintf('<i class="fa fa-home"></i> '.__('Home', 'corporate-prime'));
	} else {
		echo '<h1 class="pagetitle white animate" data-anim-type="fadeInLeft">' . get_the_title() . '</h1>';
	}

	if (!empty($title)) {
		echo $before . $title . $after;
	}
}

function corporate_prime_breadcrumbs() {
	/* === OPTIONS === */
	$text['home']     = __('Home', 'corporate-prime'); // text for the 'Home' link
	$text['category'] = __('Archive by Category "%s"', 'corporate-prime'); // text for a category page
	$text['tax']      = __('Archive for "%s"', 'corporate-prime'); // text for a taxonomy page
	$text['search']   = __('Search Results for "%s" Query', 'corporate-prime'); // text for a search results page
	$text['tag']      = __('Posts Tagged "%s"', 'corporate-prime'); // text for a tag page
	$text['author']   = __('Articles Posted by %s', 'corporate-prime'); // text for an author page
	$text['404']      = __('Error 404', 'corporate-prime'); // text for the 404 page
	$showCurrent      = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome       = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter        = '<i class="fa fa-angle-right"></i>'; // delimiter between crumbs
	$before           = '<li class="current">'; // tag before the current crumb
	$after            = '</li>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$homeLink   = esc_url(home_url('/'));
	$linkBefore = '<li typeof="v:Breadcrumb">';
	$linkAfter  = '</li>';
	$linkAttr   = ' rel="v:url" property="v:title"';
	$link       = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
	if (is_home() || is_front_page()) {
		if ($showOnHome == 1) {
			echo '<ul id="crumbs" class="breadcum top-breadcrumb"><a href="' . $homeLink . '">' . $text['home'] . '</a></ul>';
		}

	} else {
		echo '<ul id="crumbs" class="breadcum top-breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

		if (is_category()) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif (is_search()) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;
		} elseif (is_day()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {
			if (get_post_type() != 'post') {
				$post_type = get_post_type_object(get_post_type());
				$slug      = $post_type->rewrite;
				printf($link, $homeLink . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) {
					echo $delimiter . $before . get_the_title() . $after;
				}

			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) {
					$cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				}

				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) {
					echo $before . get_the_title() . $after;
				}

			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat    = get_the_category($parent->ID);
			$cat    = $cat[0];
			$cats   = get_category_parents($cat, TRUE, $delimiter);
			$cats   = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
			$cats   = str_replace('</a>', '</a>' . $linkAfter, $cats);
			echo $cats;
			printf($link, esc_url(get_permalink($parent)), $parent->post_title);
			if ($showCurrent == 1) {
				echo $delimiter . $before . get_the_title() . $after;
			}

		} elseif (is_page() && !$post->post_parent) {
			if ($showCurrent == 1) {
				echo $before . get_the_title() . $after;
			}

		} elseif (is_page() && $post->post_parent) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page          = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, esc_url(get_permalink($page->ID)), get_the_title($page->ID));
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1) {
					echo $delimiter;
				}

			}
			if ($showCurrent == 1) {
				echo $delimiter . $before . get_the_title() . $after;
			}

		} elseif (is_tag()) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif (is_404()) {
			echo $before . $text['404'] . $after;
		}
		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
				echo ' (';
			}

			echo __('Page', 'corporate-prime') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
				echo ')';
			}

		}
		echo '</ul>';
	}
} // end corporate_prime_breadcrumbs()
?>