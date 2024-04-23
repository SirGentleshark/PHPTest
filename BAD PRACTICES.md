# PHP test
# IDENTIFIED BAD PRACTICES

- Classes:
    - Lack of code comments
    - Protected rather than private properties
    - No type hint when declaring properties
    - Lack of return type hint for Getters
    - Use of string for DateTime rather than immutible format like DateTimeImmutable
    - Lack of Namespace declaration
    - Setter methods did not allow for method chaining (no return self)

  - Utils:
    - Lack of Code comments
    - Lack of Namespace declaration
    - Use of Singleton pattern and direct file requirements (NOT FIXED)
    - SQL Queries aren't parameterized to prevent SQL injections (PARTIAL FIX)
    - No return type hints