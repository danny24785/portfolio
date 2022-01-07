<?php

/**
 * @package portfolio
 */

namespace Portfolio\Overviews;

class Excerpt
{
  /**
   * remove brackets from excerpts
   */
  public function init()
  {
      add_filter('excerpt_more', [$this, 'remove_brackets_excerpt']);
  }

  public function remove_brackets_excerpt()
  {
    return ' ...';
  }
}
