# creates an alb security group
resource "aws_security_group" "alb_sg" {
  name               = "alb_sg"
  description        = "enable http and https connection for the alb"
  vpc_id             = aws_vpc.vpc.id

  ingress {
    description      = "http connection"
    from_port        = 80
    to_port          = 80
    protocol         = "tcp"
    cidr_blocks      = ["0.0.0.0/0"]
  }

  ingress {
    description      = "https connection"
    from_port        = 443
    to_port          = 443
    protocol         = "tcp"
    cidr_blocks      = ["0.0.0.0/0"]
  }


  egress {
    from_port        = 0
    to_port          = 0
    protocol         = "-1"
    cidr_blocks      = ["0.0.0.0/0"]
  }

  tags = {
    Name = "alb-sg"
  }
}

# create SSH security group
resource "aws_security_group" "ssh_sg" {
  name               = "ssh_sg"
  description        = "Allows ssh connections"
  vpc_id             = aws_vpc.vpc.id

  ingress {
    description      = "ssh connection"
    from_port        = 22
    to_port          = 22
    protocol         = "tcp"
    cidr_blocks      = [var.ssh_location]
  }

  egress {
    from_port        = 0
    to_port          = 0
    protocol         = "-1"
    cidr_blocks      = ["0.0.0.0/0"]
  }

  tags = {
    Name = "ssh-sg"
  }
}

# creates web server security group
resource "aws_security_group" "web_server_sg" {
  name               = "container_sg"
  description        = "security group for webservers via alb"
  vpc_id             = aws_vpc.vpc.id

  ingress {
    description      = "http connection"
    from_port        = 80
    to_port          = 80
    protocol         = "tcp"
    security_groups  = [aws_security_group.alb_sg.id]
  }

  ingress {
    description      = "https connection"
    from_port        = 443
    to_port          = 443
    protocol         = "tcp"
    security_groups  = [aws_security_group.alb_sg.id]
  }


  egress {
    from_port        = 0
    to_port          = 0
    protocol         = "-1"
    cidr_blocks      = ["0.0.0.0/0"]
  }

  tags = {
    Name = "webserver-sg"
  }
}

# creates the database security group
resource "aws_security_group" "DB_sg" {
  name               = "DB_sg"
  description        = "enable access to MySQL/aurora on port 3306"
  vpc_id             = aws_vpc.vpc.id

  ingress {
    description      = "MySQL/aurora access from webservers"
    from_port        = 3306
    to_port          = 3306
    protocol         = "tcp"
    security_groups  = [aws_security_group.web_server_sg.id]
  }


  egress {
    from_port        = 0
    to_port          = 0
    protocol         = "-1"
    cidr_blocks      = ["0.0.0.0/0"]
  }

  tags = {
    Name = "DB-sg"
  }
}