## Building an API in Laravel

- Responses and Codes: Returning the proper HTTP status codes (and potentially application-specific codes) is paramount to building a successful API.

- HTTP status codes are difficult to remember. Rather than replying on "magic numbers" in the controller, instead abstract all that away to readable methods in a parent class.

- Solving the issue of linking the API output to the structure of the database tables.(transformations)

- Single Responsibility Priniciple: Extract the transformation process into its own set of classes.

### Fractal

