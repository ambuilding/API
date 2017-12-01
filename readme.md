## Building an API in Laravel

- Responses and Codes: Returning the proper HTTP status codes (and potentially application-specific codes) is paramount to building a successful API.

- HTTP status codes are difficult to remember. Rather than replying on "magic numbers" in the controller, instead abstract all that away to readable methods in a parent class.

- Solving the issue of linking the API output to the structure of the database tables.(transformations)

- Authentication, limit access to our API. The simplest solution: HTTP basic authentication (with SSL).

- Single Responsibility Priniciple: Extract the transformation process into its own set of classes.

- Associate any number of tags with a given lesson. Pivot tables and tags. (many-to-many relationships)

- Paginate the API results.

- API rate limiting. Limit the numbers of allowed requests, via a midddleware - throttle.

- Token-based authentication(API) / Traditional session-based setup(Web)

### Fractal

