# create DB subnet group
resource "aws_db_subnet_group" "db_subnet_group" {
  name                        = "db-subnet-group"
  subnet_ids                  = [aws_subnet.private_datasubnetAZ1.id, aws_subnet.private_datasubnetAZ2.id]
  description                 = "subnets for database instances"

  tags                        = {
    Name                      = "dev DB subnet group"
  }
}

# get the latest rds db snapshot 
data "aws_db_snapshot" "latest_db_snapshot" {
  db_snapshot_identifier      = var.database_snapshot_identifier
  most_recent                 = true
  snapshot_type               = "manual"
}

# create the database instance from the restored db snapshot
resource "aws_db_instance" "database_instance" {
  instance_class              = var.database_instance_class
  skip_final_snapshot         = true
  availability_zone           = "us-east-1b"
  identifier                  = var.database_instance_identifier
  snapshot_identifier         = data.aws_db_snapshot.latest_db_snapshot.id
  db_subnet_group_name        = aws_db_subnet_group.db_subnet_group.name
  multi_az                    = var.multi_az_deployment
  vpc_security_group_ids      = [aws_security_group.DB_sg.id]
}