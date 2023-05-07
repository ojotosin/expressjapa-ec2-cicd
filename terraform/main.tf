# specify aws as the provider and use the 'terraform-user profile'
provider "aws" {
  region            = "us-east-1"
  profile           =  "terraform-user"
}

# store the terraform state file in s3
terraform {
  backend "s3" {
    bucket  = "tosin-a-ojo-terraform-state-bucket"
    key     = "build/terraform.tfstate"  // statefile for the project
    region  = "us-east-1"
    profile = "terraform-user"
  }
}