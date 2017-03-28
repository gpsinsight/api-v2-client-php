# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/gpsinsight/gpsinsight-api-v2-client-php).

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - Check the code style with ``$ composer style-lint`` and fix it with ``$ composer style-fix``.
- **Add/Update tests!** - Your patch won't be accepted if it doesn't have tests.
- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.
- **Follow SemVer** - We adhere to the [SemVer v2.0.0](http://semver.org/) spec, which means any breaking change to public APIs requires a major version bump.
- **Create feature branches** - Don't ask us to pull from your master branch. Use a feature branch (e.g., `feature/my-new-feature`).
- **One pull request per feature** - If you want to change/add more than one thing, send multiple pull requests.
- **Include a meaningful history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Running Tests

Make sure to run `composer install` before attempting to run the tests.

``` bash
$ composer test
```

There are also other Composer scripts defined in `composer.json` for generating docs and linting the code.

**Happy coding**!
