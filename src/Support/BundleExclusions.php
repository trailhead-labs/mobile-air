<?php

namespace Native\Mobile\Support;

class BundleExclusions
{
    /** Excluded at any depth, including inside vendor packages. */
    public const ANY_DEPTH = [
        '.git',
        '.github',
        '.idea',
        '.vscode',
        'node_modules',
        'tests',
        '.DS_Store',
        '.gitignore',
        '.gitattributes',
        '.gitkeep',
        '.editorconfig',
    ];

    /** Project-root paths excluded during copy AND removed during cleanup. */
    public const PROJECT = [
        'nativephp',
        'output',
        'build',
        'dist',
        'artifacts',
        'storage/logs',
        'storage/framework',
        'storage/app/native-build',
        'public/storage',
        'database/database.sqlite',
        '*.js',
        '*.md',
        '*.xml',
        '*.jks',
        '*.zip',
        '.env.example',
    ];

    /** Excluded during copy only — kept after composer install regenerates them. */
    public const COPY_ONLY = [
        'bootstrap/cache/*',
    ];

    /** Copied for composer install, removed during cleanup only. */
    public const CLEANUP_ONLY = [
        '*.lock',
        'artisan',
    ];

    /**
     * Directories that must exist wherever the bundle lands, recreated on
     * disk after the exclusions run and guaranteed as empty entries in
     * the archive every packer produces.
     *
     * Their contents are excluded on purpose, being compiled output and one
     * machine's sessions, but the directories themselves are not optional:
     * composer install boots Laravel through package:discover, and on the
     * device view:cache walks every registered view path at cold boot.
     */
    public const REQUIRED_DIRECTORIES = [
        'bootstrap/cache',
        'storage/framework/cache',
        'storage/framework/sessions',
        'storage/framework/views',
        // Spatie's hasViews() and the jump loadViewsFrom() register these
        // as view paths, and view:cache walks every registered path
        // with a Finder that throws on a missing directory. The
        // VENDOR_PATHS strip takes their parent, so they
        // ride along here as empty directories.
        'vendor/nativephp/mobile/resources/views',
        'vendor/nativephp/mobile/resources/jump/views',
    ];

    /** Non-runtime patterns matched only inside vendor packages. */
    public const VENDOR_PATTERNS = [
        '*.md',
        'LICENSE*',
        'docs',
        '*.yml',
        '*.yaml',
        '*.neon',
        '*.neon.dist',
    ];

    /** Specific vendor paths to exclude. */
    public const VENDOR_PATHS = [
        'vendor/nativephp/mobile/resources',
        'vendor/*/*/vendor',
        'vendor/endroid',
        'vendor/laravel/pint/builds',
        'vendor/livewire/livewire/src/Features/SupportFileUploads/browser_test_image_big.jpg',
    ];
}
