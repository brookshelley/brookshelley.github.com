<?php

# We set the default timezone here so that you can safely use the PHP
# date() function inside the config elements below, should you desire.
date_default_timezone_set('America/New_York');

$config = array(
    # the URL of our site, with trailing slash.
    'base_url' => 'https://' . $_SERVER['HTTP_HOST'] .'/',

    # the base path of the site's docroot, with trailing slash
    'base_path' => '~/brookshelley.github.com/',

    # the name of the sub-directory for images, with trailing slash.
    # we'll create sub-directories of the form 'year/month/'.
    'upload_path' => '.content/photos',

    # the max pixel width of uploaded images.
    'max_image_width' => 700,

    # the path to the Hugo site.  DO NOT include "content/", we'll handle that.
    # trailing slash required.
    'source_path' => '~/brookshelley.github.com/',

    # different types of content may have different paths.
    # by default, articles are in the root of the /content/ directory, so
    # are not included here.
    # Notes, reposts, replies, etc are being stored as Hugo data files
    # in the /data directory. No need to prepend "/data" to these paths.
    'content_paths' => array(
        'bookmark-of' => 'bookmarks',
        'in-reply-to' => date('Y/m'),
        'like-of'     => 'likes',
        'note'        => date('Y/m'),
        'photo'       => date('Y/m'),
        'repost-of'   => date('Y/m'),
        'rsvp'        => 'rsvp',
    ),

    # I am storing all photos, reposts and replies as notes. So I need a
    # way to tell Hugo to use the "note" templates for these items. This
    # override controls that.
    'content_overrides' => array(
        'in-reply-to' => 'note',
        'photo'       => 'note',
        'repost-of'   => 'note',
    ),

    # whether or not to copy uploaded files to the source /static/ directory.
    'copy_uploads_to_source' => true,

    # an external micropub media endpoint to use.
    # 'media_endpoint' => 'https://example.com/my-media-endpoint/',

    # an array of syndication targets; each of which should contain the
    # necessary credentials.
    'syndication' => array(
        'twitter' => array( 'key'          => 'CONSUMER_KEY',
                            'secret'       => 'CONSUMER_SECRET',
                            'token'        => 'ACCESS_TOKEN',
                            'token_secret' => 'ACCESS_TOKEN_SECRET',
                            'prefix'       => 'I just posted ',
                     ),
    ),

    # some Micropub clients don't set syndication targets for some actions,
    # but we may want to syndicate some stuff all the time.  For each post
    # kind, define an array of mandatory syndication targets.
    'always_syndicate' => array(
        'repost-of'   => array( 'twitter' ),
        'in-reply-to' => array( 'twitter' ),
    ),

    # the IndieAuth token endpoint to use
    'token_endpoint' => 'https://tokens.indieauth.com/token',

    # the command used to build the site
    'command' => 'hugo,
);

return $config;
?>
