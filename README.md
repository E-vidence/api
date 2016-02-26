# api
E-vidence API application


## Database deploy

start up de dev-vm with vagrant then:
```
psql -U postgres -h localhost -f db_schema/startup.sql
```