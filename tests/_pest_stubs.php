<?php
// Lightweight stubs to help IDE/static analyzers and avoid undefined function warnings.
// These only define functions if they don't already exist (Pest provides them at runtime).

namespace Pest\Faker {
    if (! function_exists(__NAMESPACE__ . '\\faker')) {
        function faker()
        {
            return \Faker\Factory::create();
        }
    }
}

namespace {
    if (! function_exists('uses')) {
        function uses(...$args)
        {
            return new class {
                public function in($dir) { /* stub for IDE */ }
            };
        }
    }

    if (! function_exists('it')) {
        function it($description, $callable = null) { /* stub for IDE */ }
    }

    if (! function_exists('beforeEach')) {
        function beforeEach($callable) { /* stub */ }
    }
}
