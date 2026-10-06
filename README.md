# PHP & HTML Week 2 Practice

A collection of small PHP and HTML practice exercises from Week 2. The repository is organized as a learning sandbox: each file isolates a language concept so it can be opened, run, and compared independently.

## Topics covered

- Variables and values
- Constants and `define()`
- Arrays and `foreach` loops
- Conditional logic
- Embedding PHP in HTML
- Basic PHP page structure
- A small static personal-web exercise

## Repository structure

```text
week2php/
├── index.php          # Practice index/page entry point
├── hello.php          # Basic output
├── define.php         # Constants with define()
├── konstanta.php      # Constant examples
├── variabel.php       # Variable examples
├── variabel2.php      # Additional variable examples
├── value.php          # Value handling examples
├── larik.php          # Array examples
├── foreach.php        # foreach examples
├── kondisi.php        # Conditional examples
├── htmlPHP.php        # PHP embedded in HTML
└── htmlPHP2.php       # Additional embedded-HTML example

personal-web/
├── index.html         # Static personal-web page
└── style.css          # Page styling
```

## Run locally

Install PHP, then start the built-in server from the repository root:

```bash
php -S localhost:8000 -t .
```

- Open `http://localhost:8000/week2php/` to explore the PHP exercises.
- Open `http://localhost:8000/personal-web/` to view the static HTML/CSS page.

## Learning goal

The repository is intentionally simple. Each exercise is meant to make one PHP concept easy to inspect before combining concepts into a larger web application.
## Learning outcomes

This repository shows the progression from isolated PHP syntax exercises to a small static web page. The exercises are intentionally separated so each concept can be inspected and tested independently.

### Practice checklist

- [x] Variables, values, and constants
- [x] Arrays and iteration
- [x] Conditional statements
- [x] PHP embedded in HTML
- [x] Basic static page styling

### Validation

Each PHP file can be opened through the local PHP server. The static page can be checked directly in a browser through the `personal-web/` path.

## Limitations

This is a learning repository rather than a deployable web product. It has no database, routing framework, authentication, automated test suite, or production deployment configuration.

## License

This repository is licensed under the [MIT License](LICENSE). The license applies to the original source and documentation included in this repository. Third-party dependencies, frameworks, fonts, images, and other external materials remain subject to their respective licenses and attribution requirements.
