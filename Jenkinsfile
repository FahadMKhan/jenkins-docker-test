pipeline {
    agent any
    stages {
        stage('Wordpress Pipeline') {
            steps {
                echo 'Authenticating with dockerhub'
		    sh 'docker login  -u fahadmkhan --password dckr_pat_Xg_9uqWuwZUJ9NKWXVM-pV3nOiY'
            }
        }
	stage('building docker file') {
            steps {
		    sh 'docker build -f ./wordpress.Dockerfile . -t fahadmkhan/linuxr:wordpress'
            }
        }
	stage('push docker images') {
            steps {
		    sh 'docker push fahadmkhan/linuxr:wordpress'
            }
        }
	stage('pull image') {
            steps {
		    sh 'docker pull fahadmkhan/linuxr:wordpress'
            }
        }
	stage('creating network') {
            steps {
		    sh 'docker network create wordpress || true'
            }
        }
	stage('Manual Approval') {
            steps {
                timeout(time: 15, unit: "MINUTES") {
	                    input message: 'Do you want to approve the deployment?', ok: 'Yes'
	                }
            }
        }
	stage('remove existing container') {
            steps {
		    sh 'docker rm -f wordpress || true'
            }
        }
        
        stage('Deployment') {
            steps {
                sh 'docker run --name wordpress --network wordpress -e WORDPRESS_DB_NAME=wp-db -e WORDPRESS_DB_PASSWORD=password -e WORDPRESS_DB_USER=root -e WORDPRESS_DB_HOST=mysql -p 8082:80 -d fahadmkhan/linuxr:wordpressv'
            }
        }
      
    }
}
