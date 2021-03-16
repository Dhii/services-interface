# Dhii - Services Interface
Interfaces for services compatible with [Service Provider][] spec.

## Details
Use this interface to enhance your services, such that a dependency graph
can be built. This paves the way for many features, including:

1. Visualization of a dependency graph of all application services.
2. Notification if a dependency is unfulfilled.
3. Suggestion of module packages that may fulfill unmet dependencies.

Use together with [`dhii/services`][] to enhance your services with
convenient shorthands and type information.

## Rationale
The current signature of a service is just a callable of form
`(ContainerInterface $c) => mixed`. This describes the service itself,
and allows it to draw dependencies from the container. However, in order
to know what other services are being used by any particular service
definition, that definition must first be invoked. This means that
as things currently are, it is not possible to build a map of all
service relationships without actually executing them all.

The solution is to make services aware of and able to expose the
names of other services that it depends on. This way, it is possible to make
quite a uniform algorithm that can record all of these relationships, and
and build a complete graph of all services and their dependencies. This
opens up new possibilities for detection and automation.

An implementation such as [`Factory`][] can declare its dependencies,
and automatically resolve them before passing them to the service
definition, making it possible to describe the types that the
dependencies are expected to be. This also cuts on the amount of code to
be written, removing not only type checks/assertions, but also the
calls to `$c->get()`. At the same time, this approach re-enforces
strictness, because a service definition no longer has the choice of
retrieving or not retrieving its dependencies: all dependencies are
declared and necessarily resolved before the definition has a chance to
do anything. This makes graphs more stable, and creates less opportunity
for hidden dependencies that may not show otherwise, such as if simply
recording all service names retrieved from the container.

The `withDependencies()` method enables [multi-boxing][], which allows the same
service provider to be re-used multiple times in the same application -
perhaps with different prefixes. This avoids not only the need for
manual re-declaration of already defined services, but also has the
potential for solving the service name collision problem, and it's no longer
necessary to come up with clever prefixes for service names _in providers_,
but shifts a part of the responsibility to the application. This is good,
because it further re-enforces the notion that the application is in
control - similarly to how the application decides which services override
which, how the providers are discovered and loaded, etc.

[Service Provider]: https://github.com/container-interop/service-provider
[`dhii/services`]: https://github.com/Dhii/services
[`Factory`]: https://github.com/Dhii/services/blob/0.1.x/src/Factory.php
[multi-boxing]: https://github.com/Dhii/services#multi-boxing
