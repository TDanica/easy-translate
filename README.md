# Currency Conversion Application

This is a simple Laravel application that demonstrates currency conversion functionality. It includes tests for the `ConversionController`, `ApiService`, and `ConversionService`.

## Setup

This application uses Docker and Laravel Sail for development. Ensure you have Docker installed on your machine before proceeding.

1. Clone the repository:
   ```
   git clone https://github.com/TDanica/easy-translate.git
   ```

2. Set up Laravel Sail:
   ```
   cd your-project
   ./vendor/bin/sail up -d
   ```

3. Run the migration:
   ```
   ./vendor/bin/sail artisan migrate
   ```

4. Run tests:
   ```
   ./vendor/bin/sail test
   ```

## Testing

This application includes tests for the following components:

- **ConversionController:** Tests the `/convert` endpoint to ensure proper currency conversion functionality.
- **ApiService:** Tests the interaction with an external API to fetch currency conversion rates.
- **ConversionService:** Tests database transactions and conversion data creation.

## Usage

1. Access the application in your browser:
   ```
   http://localhost:8000
   ```

2. Use the `/convert` endpoint to perform currency conversion.

## Contributors

- Danica Tundjova(https://github.com/TDanica)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.